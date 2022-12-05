<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create {year?} {day?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = now();

        $year = $this->argument('year') ?? $now->format('Y');
        $day = $this->argument('day') ?? $now->format('d');

        $puzzle = __DIR__.'/../../../app/Puzzles/Year'.$year.'/Day'.$day.'.php';
        if (! file_exists($puzzle)) {
            file_put_contents($puzzle, <<<END
<?php

declare(strict_types=1);

namespace App\Puzzles\Year$year;

use App\Puzzles\Puzzle;

class Day$day extends Puzzle
{
    public function part1(string \$input): int
    {
        return 0;
    }

    public function part2(string \$input): int
    {
        return 0;
    }
}

END
            );
        }

        $test = __DIR__.'/../../../tests/Unit/Year'.$year.'/Day'.$day.'Test.php';
        if (! file_exists($test)) {
            file_put_contents($test, <<<END
<?php

declare(strict_types=1);

namespace Tests\Unit\Year$year;

use Tests\Unit\DayTestCase;

class Day{$day}Test extends DayTestCase
{
    public function testPart1(): void
    {
        \$this->assertSame(0, \$this->puzzle->part1(\$this->input));
    }

    public function testPart2(): void
    {
        \$this->assertSame(0, \$this->puzzle->part2(\$this->input));
    }
}

END
            );
        }

        $data = __DIR__.'/../../../public/data/'.$year.'/'.$day;
        if (! file_exists($data)) {
            mkdir($data);
        }

        $example = __DIR__.'/../../../public/data/'.$year.'/'.$day.'/example.txt';
        if (! file_exists($example)) {
            file_put_contents($example, '');
        }

        $input = __DIR__.'/../../../public/data/'.$year.'/'.$day.'/input.txt';
        if (! file_exists($input)) {
            file_put_contents($input, '');
        }

        $this->info('All files are created.');

        return Command::SUCCESS;
    }
}
