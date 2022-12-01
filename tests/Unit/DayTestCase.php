<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Puzzles\Puzzle;
use PHPUnit\Framework\TestCase;

abstract class DayTestCase extends TestCase
{
    protected Puzzle $puzzle;
    protected string $input;

    protected function setUp(): void
    {
        preg_match('/.*Year(\d+)\\\Day(\d+)Test/', get_called_class(), $matches);
        [, $year, $day] = $matches;

        $puzzle = '\App\Puzzles\Year'.$year.'\Day'.$day;
        $input = __DIR__.'/../../public/data/'.$year.'/'.$day.'/example.txt';

        $this->puzzle = new $puzzle();
        $this->input = file_get_contents($input);
    }

    abstract public function testPart1(): void;

    abstract public function testPart2(): void;
}
