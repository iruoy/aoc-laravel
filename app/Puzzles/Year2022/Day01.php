<?php

declare(strict_types=1);

namespace App\Puzzles\Year2022;

use App\Puzzles\Puzzle;
use Illuminate\Support\Collection;

class Day01 extends Puzzle
{
    public function part1(string $input): int
    {
        return $this->getCalories($input)->max();
    }

    public function part2(string $input): int
    {
        return $this->getCalories($input)->sortDesc()->take(3)->sum();
    }

    /**
     * @param string $input
     * @return Collection<array-key, int>
     */
    private function getCalories(string $input): Collection
    {
        return collect(explode("\n\n", $input))
            ->map(fn ($elf) => explode("\n", $elf))
            ->map(fn ($snacks) => (int) array_sum($snacks));
    }
}
