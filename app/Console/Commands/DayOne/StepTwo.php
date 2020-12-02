<?php

namespace App\Console\Commands\DayOne;

use Illuminate\Console\Command;

class StepTwo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dayone:steptwo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the day one two one command to generate the three entries that sum to 2020 and multiplies them together';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * Pretty much just bruteforcing the number here, not an amazing way to handle it
     * Might have been better to clone the original number array and move the numbers we use to add, out of that array
     * So we know we're actually adding unique numbers together
     *
     * @return int
     */
    public function handle()
    {
        $found = false;
        $numberOne = 0;
        $numberTwo = 0;
        $numberThree = 0;
        $input = $this->getInputNumbers();
        $newArray = [];
        while (!$found) {
            $newArray = [
                0 => $input[array_rand($input)],
                1 => $input[array_rand($input)],
                2 => $input[array_rand($input)],
            ];
            $sum = $newArray[0] + $newArray[1] + $newArray[2];
            if($sum == 2020) {
                $found = true;
            }
        }
        $this->info('Your final number is: ' . $newArray[0] * $newArray[1] * $newArray[2]);
        return 0;
    }

    public function getInputNumbers()
    {
        return config('dayone.stepone');
    }
}
