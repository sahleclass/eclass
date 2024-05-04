<?php

namespace Imanghafoori\LaravelMicroscope\Features\ExtractsBladePartials;

use Illuminate\Console\Command;
use Imanghafoori\LaravelMicroscope\ErrorReporters\ErrorPrinter;
use Imanghafoori\LaravelMicroscope\Iterators\BladeFiles;
use Imanghafoori\LaravelMicroscope\Traits\LogsErrors;

class CheckExtractBladeIncludesCommand extends Command
{
    use LogsErrors;

    protected $signature = 'check:extract_blades';

    protected $description = 'Checks to extract blade partials';

    public function handle(ErrorPrinter $errorPrinter)
    {
        if (! $this->startWarning()) {
            return;
        }

        event('microscope.start.command');

        $errorPrinter->printer = $this->output;

        iterator_to_array(BladeFiles::check([ExtractBladePartial::class]));

        $this->info('Blade files extracted.');
    }

    private function startWarning()
    {
        $this->info('Checking to extract blade partials...');
        $this->warn('This command is going to make changes to your files!');

        return $this->output->confirm('Do you have committed everything in git?', true);
    }
}
