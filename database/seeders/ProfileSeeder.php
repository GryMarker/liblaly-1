<?php

namespace Database\Seeders;

use App\Models\profile;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (profile::count() == 0) {
            profile::factory(19)->create();
        }
    }
}
