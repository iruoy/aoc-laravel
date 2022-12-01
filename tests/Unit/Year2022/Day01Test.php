<?php

declare(strict_types=1);

namespace Tests\Unit\Year2022;

use Tests\Unit\DayTestCase;

class Day01Test extends DayTestCase
{
    public function testPart1(): void
    {
        $this->assertSame(24000, $this->puzzle->part1($this->input));
    }

    public function testPart2(): void
    {
        $this->assertSame(45000, $this->puzzle->part2($this->input));
    }
}
