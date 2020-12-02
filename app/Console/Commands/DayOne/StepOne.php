<?php

namespace App\Console\Commands\DayOne;

use Illuminate\Console\Command;

class StepOne extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dayone:stepone';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the day one step one command to generate the two entries that sum to 2020 and multiplies them together';

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
     *
     * @return int
     */
    public function handle()
    {
       $found = false;
       $numberOne = 0;
       $numberTwo = 0;
        if(!$found) {
            foreach ($this->getInputNumbers() as $inputNumber) {
                    for ($i = 0; $i < count($this->getInputNumbers()); $i++) {
                        if ($inputNumber + $this->getInputNumbers()[$i] == 2020) {
                            $found = true;
                            $numberOne = $inputNumber;
                            $numberTwo = $this->getInputNumbers()[$i];
                        }
                    }

            }
        }
        $this->info('Your final number is: ' . $numberOne * $numberTwo);
        return 0;
    }

    public function getInputNumbers()
    {
      return config('dayone.stepone');
    }
}
