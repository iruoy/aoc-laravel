<?php

declare(strict_types=1);

namespace Tests\Unit\Year2022;

use Tests\Unit\DayTestCase;

class Day02Test extends DayTestCase
{
    public function testPart1(): void
    {
        $this->assertSame(15, $this->puzzle->part1($this->input));
    }

    public function testPart2(): void
    {
        $this->assertSame(12, $this->puzzle->part2($this->input));
    }
}
