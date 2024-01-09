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

        DB::table('types')->insert([
            ['name' => 'Necklace'],
            ['name' => 'Earring'],
            ['name' => 'Ring']
        ]);

        DB::table('catalogs')->insert([
            [
                'title' => 'Engagement Ring 1',
                'slug' => 'engagement-ring',
                'introduction' => 'This is intro title',
                'description' => 'This is description',
                'banner' => '01HKH4BMVYVYGVPQRAHR9MEW36.png',
                'images' => '["01HKPK9WVJ6WWS02T0ZEPVVMMY.png","01HKPK9WVN8M93ZZZGCA4Z0TM2.png","01HKPK9WVV10M3JVCYDP00E5CA.png","01HKPK9WVZHF94M19Q84ED7AJF.png","01HKPK9WW1VE3NKV0FACKEQV6Y.png"]',
                'color' => 'white_gold',
                'karat' => '14K',
                'gender' => 'Gents',
                'material' => 'Gold',
                'type' => '1',
                'product_code' => '1234',
                'visible' => '1'
            ],
            [
                'title' => 'Engagement Ring 2',
                'slug' => 'engagement-ring2',
                'introduction' => 'This is intro title',
                'description' => 'This is description',
                'banner' => '01HKH4BMVYVYGVPQRAHR9MEW36.png',
                'images' => '["01HKPK9WVJ6WWS02T0ZEPVVMMY.png","01HKPK9WVN8M93ZZZGCA4Z0TM2.png","01HKPK9WVV10M3JVCYDP00E5CA.png","01HKPK9WVZHF94M19Q84ED7AJF.png","01HKPK9WW1VE3NKV0FACKEQV6Y.png"]',
                'color' => 'white_gold',
                'karat' => '14K',
                'gender' => 'Gents',
                'material' => 'Gold',
                'type' => '2',
                'product_code' => '1235',
                'visible' => '2'
            ],
            [
                'title' => 'Engagement Ring 3',
                'slug' => 'engagement-ring3',
                'introduction' => 'This is intro title',
                'description' => 'This is description',
                'banner' => '01HKH4BMVYVYGVPQRAHR9MEW36.png',
                'images' => '["01HKPK9WVJ6WWS02T0ZEPVVMMY.png","01HKPK9WVN8M93ZZZGCA4Z0TM2.png","01HKPK9WVV10M3JVCYDP00E5CA.png","01HKPK9WVZHF94M19Q84ED7AJF.png","01HKPK9WW1VE3NKV0FACKEQV6Y.png"]',
                'color' => 'white_gold',
                'karat' => '14K',
                'gender' => 'Gents',
                'material' => 'Gold',
                'type' => '3',
                'product_code' => '1236',
                'visible' => '1'
            ],
            [
                'title' => 'Engagement Ring 4',
                'slug' => 'engagement-ring4',
                'introduction' => 'This is intro title',
                'description' => 'This is description',
                'banner' => '01HKH4BMVYVYGVPQRAHR9MEW36.png',
                'images' => '["01HKPK9WVJ6WWS02T0ZEPVVMMY.png","01HKPK9WVN8M93ZZZGCA4Z0TM2.png","01HKPK9WVV10M3JVCYDP00E5CA.png","01HKPK9WVZHF94M19Q84ED7AJF.png","01HKPK9WW1VE3NKV0FACKEQV6Y.png"]',
                'color' => 'white_gold',
                'karat' => '14K',
                'gender' => 'Gents',
                'material' => 'Gold',
                'type' => '2',
                'product_code' => '1237',
                'visible' => '1'
            ],
            [
                'title' => 'Engagement Ring 5',
                'slug' => 'engagement-ring5',
                'introduction' => 'This is intro title',
                'description' => 'This is description',
                'banner' => '01HKH4BMVYVYGVPQRAHR9MEW36.png',
                'images' => '["01HKPK9WVJ6WWS02T0ZEPVVMMY.png","01HKPK9WVN8M93ZZZGCA4Z0TM2.png","01HKPK9WVV10M3JVCYDP00E5CA.png","01HKPK9WVZHF94M19Q84ED7AJF.png","01HKPK9WW1VE3NKV0FACKEQV6Y.png"]',
                'color' => 'white_gold',
                'karat' => '14K',
                'gender' => 'Gents',
                'material' => 'Gold',
                'type' => '3',
                'product_code' => '1238',
                'visible' => '1'
            ],
        ]);
    }
}
