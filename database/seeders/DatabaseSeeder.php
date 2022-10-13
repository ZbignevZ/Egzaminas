<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $address = ['1 Montgomery Road, Widnes,WA8 8EG',
        '1 Evenwood Close, Runcorn,WA7 1SH',
        '64A Church Street, Warrington,WA1 2SY',
        '65 Wellington Road, Timperley,WA15 7RH',
        '14 Brackley Street, Runcorn ,WA7 1EQ',
        '59 High Street ABERDEEN AB5 0TA',
        '66 The Green BOURNEMOUTH BH54 3LE',
        '50 The Drive, Isleworth , TW4 7AD',
        '18 High Street, Slough ,SL1 1EQ'];
        $time = Carbon::now();
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
            'role' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
            'role' => 10
        ]);
       
        foreach(['PizzaHut', 'Fat Buddy', 'Eat', 'Food Factory', 'Chili Pizza']as $cat){
            DB::table('restaurants')->insert([
            'title' => $cat,
            'address' => Arr::random($address),
            'created_at' => $time->addSeconds(1),
            'updated_at' => $time
            ]);
        }
        foreach([
            'Spaghetti Bolonese', 
            'Pizza Capricciosa',
            'Kiev Balls', 
            'Classic Chili',
            'Chicken Soup', 
            'Chocolate Cake',
            'Spicy Chicken Wings', 
            'Spicy Pork Ribs',
            'BBQ Pork Ribs', 
            'Pizza Cheessy',
            'Chilli Soup', 
            'Fresh Vegetable Salat'
            ]as $meal){
            DB::table('meals')->insert([
            'title' => $meal,
            'Price' => rand(100, 1000)/100,
            'restaurant_id' => rand(1, 5),
            'created_at' => $time->addSeconds(1),
            'updated_at' => $time
            ]);
    }
}
}
