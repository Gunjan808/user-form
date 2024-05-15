<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
         // Create a sample user
        foreach (range(1, 2) as $index) {
            User::create([
              

                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'description' => $faker->sentence,
                'role_id' => 1,
                'profile_image' => $faker->image('public/storage/profile_images', 400, 300, null, false),
            ]);
        }
    }
}
