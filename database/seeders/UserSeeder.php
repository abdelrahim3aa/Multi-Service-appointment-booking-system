<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        $provider = User::create([
            'name' => 'Provider User',
            'email' => 'provider@example.com',
            'password' => Hash::make('password'),
        ]);
        $provider->assignRole('provider');

        $client = User::create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'password' => Hash::make('password'),
        ]);
        $client->assignRole('client');
    }
}
