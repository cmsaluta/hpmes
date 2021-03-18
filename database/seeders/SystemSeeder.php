<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\System;

class SystemSeeder extends Seeder
{

    private $system = [
        [
            'id' => '1',
            'title' => 'NAME',
            'value' => 'HPME++ IS'           
        ],
        [
            'id' => '2',
            'title' => 'DESCRIPTION',
            'value' => 'Harmonize Planning and Monitoring Evaluation ++ Information System'
        ],
        [
            'id' => '3',
            'title' => 'VERSION',
            'value' => '01'
        ],
        [
            'id' => '4',
            'title' => 'YEAR',
            'value' => '2021'
        ]


            

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $systems = $this->system;
        foreach ($systems as $key => $data) {
            System::create($data);
        }
    }
}
