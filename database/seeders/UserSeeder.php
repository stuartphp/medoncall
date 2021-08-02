<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Stuart Harrison',
            'code'  =>'Rj7U23Serp',
            'email' => 'stuart@itecassist.co.za',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'mobile_number' => '0826512384',
            'team_id'=>0
        ]);
        User::create([
            'name' => 'Admin User',
            'code'  =>'2',
            'email' => 'admin@demo.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'mobile_number' => '0826512384',
            'team_id'=>1
        ]);
        User::create([
            'name' => 'User',
            'code'  =>'3',
            'email' => 'user@demo.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'mobile_number' => '0826512384',
            'team_id'   =>1,
        ]);
    }
}
