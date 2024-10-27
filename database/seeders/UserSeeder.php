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
        $this->createAgentUser();
        $this->createAdminUser();
    }

    public function createAgencyUser()
    {
        User::create([
            'id' => 3,
            'name'     => 'Agency User',
            'email'    => 'agency@agency.com',
            'password' => bcrypt('password'),
            'usertype' => 'agency',
            'AgencyID' => 1,
            'AgencyName' => 'Barry Real Estate'
        ]);
    }

    public function createAgentUser()
    {
        User::create([
            'id' => 2,
            'name'     => 'Agent User',
            'email'    => 'agent@agent.com',
            'password' => bcrypt('password'),
            'usertype' => 'agent',
            'AgencyID' => null,   // Set to NULL
            'AgencyName' => null  // Set to NULL
        ]);
    }

    public function createAdminUser()
    {
        User::create([
            'id' => 1,
            'name'     => 'Admin User',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('password'),
            'usertype' => 'admin',
            'AgencyID' => null,   // Set to NULL
            'AgencyName' => null  // Set to NULL
        ]);
    }
}
