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
            'surname' => 'Singh',
            'email' => 'contact@amitoj.dev',
            'password' => Hash::make('Admin#2002'),
            'is_admin' => true,
            'address' => '123 Park, Brampton, ON - 123123',
            'phone_number' => '9876543210'
        ]);

        DB::table('types')->insert([
            ['name' => 'Necklace', 'image' => '01HKH4BMVYVYGVPQRAHR9MEW36.png'],
            ['name' => 'Earring', 'image' => '01HKH4BMVYVYGVPQRAHR9MEW36.png'],
            ['name' => 'Ring', 'image' => '01HKH4BMVYVYGVPQRAHR9MEW36.png']
        ]);

        for ($i = 0; $i < 50; $i++) {
            DB::table('catalogs')->insert([
                [
                    'title' => 'Engagement Ring ' . $i,
                    'slug' => 'engagement-ring'. $i,
                    'introduction' => 'This is intro title',
                    'description' => 'This is description',
                    'banner' => '01HKH4BMVYVYGVPQRAHR9MEW36.png',
                    'images' => '["01HKPK9WVJ6WWS02T0ZEPVVMMY.png","01HKPK9WVN8M93ZZZGCA4Z0TM2.png","01HKPK9WVV10M3JVCYDP00E5CA.png","01HKPK9WVZHF94M19Q84ED7AJF.png","01HKPK9WW1VE3NKV0FACKEQV6Y.png"]',
                    'color' => 'white_gold',
                    'karat' => '14K',
                    'gender' => 'Gents',
                    'material' => 'Gold',
                    'type_id' => rand(1, 3),
                    'product_code' => $i,
                    'best_seller' => false,
                    'is_slide' => false,
                    'visible' => true
                ]
            ]);
        }
    }
}
