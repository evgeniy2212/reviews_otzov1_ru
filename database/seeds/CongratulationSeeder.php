<?php

use Illuminate\Database\Seeder;
use App\Models\Congratulation;
use App\Models\User;

class CongratulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $congratulations = [
            [
                'name' => 'default',
                'src' => 'images/congratulations/default_congratulation.png',
            ],
            [
                'name' => 'first',
                'src' => 'images/congratulations/congratulation_1.png',
            ],
            [
                'name' => 'second',
                'src' => 'images/congratulations/congratulation_2.png',
            ],
            [
                'name' => 'third',
                'src' => 'images/congratulations/congratulation_3.png',
            ],
            [
                'name' => 'fourth',
                'src' => 'images/congratulations/congratulation_4.png',
            ],
            [
                'name' => 'fifth',
                'src' => 'images/congratulations/congratulation_5.png',
            ],
        ];

        foreach($congratulations as $congratulation){
            Congratulation::firstOrCreate($congratulation);
        }

        User::where('id', '<>', 0)
            ->update([
                'congratulation_id' => Congratulation::all()->first()->id
            ]);
    }
}
