<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(5)->sequence(
            [
                'name' => 'First Test User',
                'email' => 'testone@example.com',
                'mobile' => '09194904900'
            ],
            [
                'name' => 'Second Test User',
                'email' => 'testtwo@example.com',
                'mobile' => '09194904901'
            ],
            [
                'name' => 'Third Test User',
                'email' => 'testthree@example.com',
                'mobile' => '09194904902'
            ],
                        [
                'name' => 'Four Test User',
                'email' => 'testfour@example.com',
                'mobile' => '09194904903'
            ],
                        [
                'name' => 'Five Test User',
                'email' => 'testfive@example.com',
                'mobile' => '09194904904'
            ],
        )->create();
    }
}
