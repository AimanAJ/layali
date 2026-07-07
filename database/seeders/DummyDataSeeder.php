<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $password = Hash::make('12345678');

        // ======================================================================
        // =========================== Admin Section ============================
        // ======================================================================
        User::create([
            'name' => 'Super Admin',
            'email' => 'super_admin@layali.com',
            'phone' => '079999999',
            'password' => $password,
        ]);

    }
}
