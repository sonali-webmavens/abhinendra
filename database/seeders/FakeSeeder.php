<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fake;

class FakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Fake::create([
        'name'=>'abhi',
        'email'=>'abhinendra@webmavens.com',
        'city'=>'kanpur',
        ]
    );
    }
}
