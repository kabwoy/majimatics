<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'first_name' => 'James',
                'last_name' => 'doe',
                'email' => 'j@gmail.com',
                'password' => Hash::make('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'first_name' => 'Mary',
                'last_name' => 'doe',
                'email' => 'mary@gmail.com',
                'password' => Hash::make('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Maina',
                'last_name' => 'Njoroge',
                'email' => 'maina@gmail.com',
                'password' => Hash::make('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        User::insert($users);
    }
}
