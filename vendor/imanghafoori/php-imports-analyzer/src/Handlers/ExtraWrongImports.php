<?php

namespace Imanghafoori\ImportAnalyzer\Handlers;

use Imanghafoori\ImportAnalyzer\ErrorReporters\ErrorPrinter;

class ExtraWrongImports
{
    public static function handle($extraWrongImports, $absPath)
    {
        $printer = ErrorPrinter::singleton();

        foreach ($extraWrongImports as [$class, $lineNumber]) {
            $printer->simplePendError(
                "use $class;",
                $absPath,
                $lineNumber,
                'extraWrongImport',
                'Unused & wrong import:'
            );
        }
    }
}
