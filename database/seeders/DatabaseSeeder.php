<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Amitoj',
            'email' => 'contact@amitoj.dev',
            'password' => Hash::make('Admin#2002'),
            'is_admin' => 1,
            'address' => '123 Park, Brampton, ON - 123123',
            'phone_number' => '9876543210'
        ]);
    }
}
