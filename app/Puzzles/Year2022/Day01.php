<?php

declare(strict_types=1);

namespace App\Puzzles\Year2022;

class Day01
{
    public function part1(string $input): int
    {
        return $this->getCalories($input)->max();
    }

    public function part2(string $input): int
    {
        return $this->getCalories($input)->take(3)->sum();
    }

    private function getCalories(string $input)
    {
        return collect(explode("\n\n", $input))
            ->map(fn ($elf) => explode("\n", $elf))
            ->map(fn ($snacks) => array_sum($snacks))
            ->sortDesc();
    }
}
