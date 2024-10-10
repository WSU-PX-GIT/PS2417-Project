<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createAgencyUser();
    }

    public function createAgencyUser()
    {
        User::create([
            'id' => 3,
            'name'     => 'Agency User',
            'email'    => 'agency@agency.com',
            'password' => bcrypt('password'),
            'usertype' => 'agency'
        ]);
    }
}
