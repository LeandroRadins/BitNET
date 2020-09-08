<?php

use Illuminate\Database\Seeder;

class TemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tema::class, 100)->create();
    }
}
