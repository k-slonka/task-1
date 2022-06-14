<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(User::class, 'simple')->times(20)->create();
    }
}
