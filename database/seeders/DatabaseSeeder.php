<?php

namespace Database\Seeders;

use App\Models\InterestCategory;
use App\Models\User;
use App\Models\UserInterest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'name' => 'John Wick',
            'email' => 'jwick@mail.com',
            'password' => Hash::make('secret')
        ]);

        User::query()->create([
            'name' => 'John Wick 2',
            'email' => 'jwick2@mail.com',
            'password' => Hash::make('secret')
        ]);

        InterestCategory::query()->create([
           'category_name' => 'games'
        ]);

        InterestCategory::query()->create([
            'category_name' => 'sport'
        ]);

        InterestCategory::query()->create([
            'category_name' => 'martial arts'
        ]);

        UserInterest::query()->create([
            'user_id' => 1,
            'interest_name' => 'boxing',
            'category_id' => 3
        ]);

        UserInterest::query()->create([
            'user_id' => 1,
            'interest_name' => 'football',
            'category_id' => 1
        ]);

        UserInterest::query()->create([
            'user_id' => 2,
            'interest_name' => 'hockey',
            'category_id' => 2
        ]);

        UserInterest::query()->create([
            'user_id' => 2,
            'interest_name' => 'wushuu',
            'category_id' => 3
        ]);
    }
}
