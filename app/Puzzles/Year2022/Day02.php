<?php

declare(strict_types=1);

namespace App\Puzzles\Year2022;

use App\Enums\RPS;
use App\Puzzles\Puzzle;

class Day02 extends Puzzle
{
    public function part1(string $input): int
    {
        $total = 0;

        foreach (explode("\n", trim($input)) as $round) {
            $players = explode(' ', $round);

            $him = $this->rps($players[0]);
            $you = $this->rps($players[1]);

            $total += $you->value + $this->score($him, $you);
        }

        return $total;
    }

    public function part2(string $input): int
    {
        $total = 0;

        foreach (explode("\n", trim($input)) as $round) {
            $players = explode(' ', $round);

            $him = $this->rps($players[0]);
            $needed = match ($players[1]) {
                'X' => 0,
                'Y' => 3,
                'Z' => 6,
            };

            $i = 0;
            do {
                $you = RPS::cases()[$i++];
                $score = $this->score($him, $you);
            } while ($score !== $needed);

            $total += $you->value + $score;
        }

        return $total;
    }

    private function rps(string $choice): ?RPS
    {
        return match ($choice) {
            'A', 'X' => RPS::Rock,
            'B', 'Y' => RPS::Paper,
            'C', 'Z' => RPS::Scissors,
            default => null
        };
    }

    private function score(RPS $him, RPS $you): int
    {
        if (
            ($him === RPS::Rock && $you === RPS::Paper) ||
            ($him === RPS::Paper && $you === RPS::Scissors) ||
            ($him === RPS::Scissors && $you === RPS::Rock)
        ) {
            return 6;
        } elseif ($him === $you) {
            return 3;
        } else {
            return 0;
        }
    }
}
