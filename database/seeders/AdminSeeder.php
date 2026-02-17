<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'minimal',
            'email' => 'progressive@techno.com',
            'email_verified_at' => now(),
            'moonshine_user_role_id' => config('my_constants.role.MODERATOR'),
            'password' => Hash::make('acid_house_Life'),
            'remember_token' => Str::random(100)
        ]);
    }
}
