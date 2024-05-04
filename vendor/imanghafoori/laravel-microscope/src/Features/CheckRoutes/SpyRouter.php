<?php

namespace Imanghafoori\LaravelMicroscope\Features\CheckRoutes;

use Closure;
use Illuminate\Routing\Router;
use Illuminate\Support\Str;
use Imanghafoori\LaravelMicroscope\Analyzers\ComposerJson;
use Imanghafoori\LaravelMicroscope\ErrorReporters\ErrorPrinter;
use Throwable;

class SpyRouter extends Router
{
    public $routePaths = [];

    /**
     * @var \Imanghafoori\LaravelMicroscope\Features\CheckRoutes\SpyRouteCollection
     */
    private $routesSpy = null;

    public function spyRouteConflict()
    {
        $this->routesSpy = $this->routes = new SpyRouteCollection();
    }

    protected function loadRoutes($routes)
    {
        // This is needed to collect the route paths to tokenize and run inspections.
        ! ($routes instanceof Closure) && $this->routePaths[] = $routes;

        parent::loadRoutes($routes);
    }

    public function updateGroupStack(array $attributes)
    {
        parent::updateGroupStack($attributes);

        $command = $_SERVER['argv'][1] ?? '';
        $checkAll = Str::startsWith('check:all', $command);
        if (! $checkAll && ! Str::startsWith('check:routes', $command)) {
            return;
        }

        try {
            $e = $this->groupStack;
            $newAttr = end($e);

            $i = 2;
            while (
                ($info = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $i + 1)[$i])
                &&
                $this->isExcluded($info)
            ) {
                $i++;
            }

            $namespace = $newAttr['namespace'] ?? null;

            if ($namespace) {
                $dir = ComposerJson::make()->getRelativePathFromNamespace($namespace);
            } else {
                $dir = null;
            }

            if (isset($attributes['middlewares'])) {
                $err = "['middlewares' => ...] key passed to Route::group(...) is not correct.";
                $this->routeError($info, $err, "Incorrect 'middlewares' key.");
            }
            if ($namespace && $dir && isset($attributes['namespace']) && ! is_dir($dir) && \str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $namespace) !== $dir) {
                $err = "['namespace' => "."'".$attributes['namespace'].'\'] passed to Route::group(...) is not correct.';
                $this->routeError($info, $err, 'Incorrect namespace.');
            }
        } catch (Throwable $e) {
            //
        }
    }

    public function routeError($info, $err, $msg)
    {
        /**
         * @var $p ErrorPrinter
         */
        $p = ErrorPrinter::singleton();

        $p->simplePendError(
            null,
            $info['file'] ?? '',
            $info['line'] ?? 1,
            'route',
            $msg,
            $err
        );
    }

    private function isExcluded($info)
    {
        return Str::startsWith($info['file'] ?? '', [
            base_path('vendor'.DIRECTORY_SEPARATOR.'laravel'),
            base_path('vendor'.DIRECTORY_SEPARATOR.'imanghafoori'),
        ]);
    }

    public function addRoute($methods, $uri, $action)
    {
        $i = 2;
        while (
            ($info = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $i + 1)[$i])
            &&
            $this->isExcluded($info)
        ) {
            $i++;
        }
        $routeObj = $this->createRoute($methods, $uri, $action);
        $this->routesSpy && $this->routesSpy->addCallSiteInfo($routeObj, $info);

        return $this->routes->add($routeObj);
    }
}
