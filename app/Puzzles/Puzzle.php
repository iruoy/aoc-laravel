<?php

declare(strict_types=1);

namespace App\Puzzles;

abstract class Puzzle
{
    abstract public function part1(string $input): int;

    abstract public function part2(string $input): int;
}
