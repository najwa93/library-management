<?php

namespace Database\Seeders;

use App\Constants\UserTypeConstant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '096784533',
            'user_type' => UserTypeConstant::ADMIN,
            'password' => Hash::make('admin1234')
        ]);
    }
}
