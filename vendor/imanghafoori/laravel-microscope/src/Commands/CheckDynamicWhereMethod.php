<?php

namespace Imanghafoori\LaravelMicroscope\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Concerns\QueriesRelationships;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Imanghafoori\LaravelMicroscope\ErrorReporters\ErrorPrinter;
use Imanghafoori\LaravelMicroscope\SearchReplace\IsSubClassOf;
use Imanghafoori\LaravelMicroscope\Traits\LogsErrors;
use Imanghafoori\SearchReplace\Filters;

class CheckDynamicWhereMethod extends Command
{
    use LogsErrors;
    use PatternApply;

    protected $signature = 'check:dynamic_wheres {--f|file=} {--d|folder=}';

    protected $description = 'Enforces the non-dynamic where clauses.';

    protected $customMsg = 'No dynamic where clause was found!   \(^_^)/';

    protected $excludeMethods = [
        'whereHas',
        'whereDoesntHave',
        'whereHasMorph',
        'whereDoesntHaveMorph',
        'whereRelation',
        'whereMorphRelation',
        'whereMorphedTo',
        'whereBelongsTo',
        'whereColumn',
        'whereRaw',
        'whereIn',
        'whereNotIn',
        'whereIntegerInRaw',
        'whereIntegerNotInRaw',
        'whereNull',
        'whereNotNull',
        'whereBetween',
        'whereBetweenColumns',
        'whereNotBetween',
        'whereNotBetweenColumns',
        'whereDate',
        'whereTime',
        'whereDay',
        'whereMonth',
        'whereYear',
        'whereNested',
        'whereExists',
        'whereNotExists',
        'whereRowValues',
        'whereJsonContains',
        'whereJsonDoesntContain',
        'whereJsonLength',
        'whereFullText',
        'whereNot',
        'whereInstanceOf',
        'whereStrict',
        'whereInStrict',
        'whereNotInStrict',
        'whereAny',
    ];

    public function handle(ErrorPrinter $errorPrinter)
    {
        event('microscope.start.command');
        $this->info('Soaring like an eagle...');

        Filters::$filters['is_sub_class_of'] = IsSubClassOf::class;

        return $this->patternCommand($errorPrinter);
    }

    private function getPatterns(): array
    {
        $dynamicWhere = function ($matchedToken) {
            return strlen($matchedToken[1]) > 5
                && Str::startsWith($matchedToken[1], ['where'])
                && ! in_array($matchedToken[1], $this->excludeMethods)
                && ! method_exists(Builder::class, $matchedToken[1])
                && ! method_exists(QueriesRelationships::class, $matchedToken[1]);
        };

        $mutator = function ($matches) {
            $matches[0][1] = $this->deriveColumnName($matches[0][1]);

            return $matches;
        };

        return [
            'pattern_name_1' => [
                'search' => '::<name>(',
                'replace' => '::query()->where(<1>, ',
                'filters' => [
                    1 => [
                        [$dynamicWhere, null],
                    ],
                ],
                'mutator' => $mutator,
            ],
            'pattern_name_3' => [
                'search' => ')-><name>(<in_between>)',
                'replace' => ')->where(<1>, <2>)',
                'filters' => [
                    1 => [
                        [$dynamicWhere, null],
                    ],
                ],
                'mutator' => $mutator,
            ],

        ];
    }

    private function deriveColumnName($methodName): string
    {
        return "'".strtolower(Str::snake(substr($methodName, 5)))."'";
    }
}
