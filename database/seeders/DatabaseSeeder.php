<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Clinic::factory(1)->create();

        \App\Models\Doctor::create([
            'name'      => 'Anggita',
            'nip'       => '000001',
            'address'   => 'Semarang',
            'phone'     => '08213764875667',
            'clinic_id' => \App\Models\Clinic::first()->id,
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        \App\Models\Admin::create([
            'username' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        \App\Models\Schedule::create([
            'doctor_id' => \App\Models\Doctor::first()->id,
            'days'      => 'senin',
            'start_hour' => '08:00:00',
            'end_hour' => '10:00:00'
        ]);
    }
}
