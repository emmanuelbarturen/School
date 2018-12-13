<?php

use Illuminate\Database\Seeder;

/**
 * Class TeachersTableSeeder
 */
class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Teacher::class, 5)->create();
    }
}
