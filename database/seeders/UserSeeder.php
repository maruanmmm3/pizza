<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Maruan Aguilar Avila',
            'email' => 'maruan123trabajo@gmail.com',
            'password' => bcrypt('87654321')
        ])->assignRole('Admin');
        
        User::factory(99)->create();
    }
}
