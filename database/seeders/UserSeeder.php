<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name' => "Admin",
            'email' => "admin@admin.com",
            'password' => \Hash::make("12345"),
            'status' => 1,
            'access_level' => 1
        ]);
    }
}
