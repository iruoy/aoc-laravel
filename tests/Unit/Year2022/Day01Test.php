<?php

declare(strict_types=1);

namespace Tests\Unit\Year2022;

use PHPUnit\Framework\TestCase;

class Day01Test extends TestCase
{
    protected function setUp(): void
    {
        $this->solution = new \App\Puzzles\Year2022\Day01();
        $this->data = file_get_contents(__DIR__.'/../../../public/data/2022/01/example.txt'); // @phpstan-ignore-line
    }

    public function testPart1(): void
    {
        $this->assertSame(24000, $this->solution->part1($this->data));
    }

    public function testPart2(): void
    {
        $this->assertSame(45000, $this->solution->part2($this->data));
    }
}
