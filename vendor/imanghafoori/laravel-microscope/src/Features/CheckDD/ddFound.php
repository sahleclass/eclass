<?php

namespace Imanghafoori\LaravelMicroscope\Features\CheckDD;

use Illuminate\Support\Facades\Event;
use Imanghafoori\LaravelMicroscope\ErrorReporters\ErrorPrinter;
use Imanghafoori\LaravelMicroscope\ErrorTypes\MicroEvent;

class ddFound
{
    use MicroEvent;

    public static function listen()
    {
        Event::listen(self::class, function (ddFound $event) {
            $data = $event->data;
            ErrorPrinter::singleton()->simplePendError(
                $data['name'],
                $data['absPath'],
                $data['lineNumber'],
                'ddFound',
                'Debug function found: '
            );
        });
    }
}
