<?php

namespace App\Console\Commands;

use App\Puzzles\Puzzle;
use Illuminate\Console\Command;

class Run extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run {year?} {day?} {--test}';

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
        $test = $this->option('test');

        $classString = '\App\Puzzles\Year'.$year.'\Day'.$day;
        if (! class_exists($classString)) {
            $this->error('The solution for this day doesn\'t exist.');

            return Command::FAILURE;
        }

        $solution = new $classString();
        if (! $solution instanceof Puzzle) {
            $this->error('The solution for this day doesn\'t exist.');

            return Command::FAILURE;
        }

        $filename = __DIR__.'/../../../public/data/'.$year.'/'.$day.'/'.($test ? 'example' : 'input').'.txt';
        if (! file_exists($filename)) {
            $this->error('The '.($test ? 'example' : 'input').' for this day doesn\'t exist.');

            return Command::FAILURE;
        }

        $data = file_get_contents($filename);
        if (! is_string($data)) {
            $this->error('The '.($test ? 'example' : 'input').' for this day doesn\'t exist.');

            return Command::FAILURE;
        }

        $this->info('Part 1: '.$solution->part1($data));
        $this->info('Part 2: '.$solution->part2($data));

        return Command::SUCCESS;
    }
}
