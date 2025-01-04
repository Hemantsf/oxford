<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;

class InstructorsSeeder extends Seeder
{
    public function run()
        {
            Instructor::truncate();
            \App\Models\Instructor::create(['name' => 'John Doe', 'bio' => 'Experienced Laravel Developer']);
            \App\Models\Instructor::create(['name' => 'Jane Smith', 'bio' => 'Expert in Web Design']);
        }

}
