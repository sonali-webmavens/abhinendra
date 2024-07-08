<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Worker;
use App\Models\Fake;
use App\Models\NewCompany;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Worker::factory(100)->create();
         Fake::factory(100)->create();
         NewCompany::factory(100)->create();
          $this->call([
            FakeSeeder::class,
            userSeeder::class,
        ]);
    }
}
