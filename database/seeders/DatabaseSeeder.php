<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed default Admin User
        User::updateOrCreate(
            ['email' => 'admin@pradana.co.id'],
            [
                'name' => 'Administrator Pradana',
                'password' => Hash::make('adminpradana26'),
            ]
        );

        $this->call([
            KontenBerandaSeeder::class,
            KontenProfilSeeder::class,
            SloKategoriLayananSeeder::class,
        ]);
    }
}
