<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user (idempotent): create or update to avoid unique constraint errors
        User::updateOrCreate(
            ['email' => 'admin@nexus.com'],
            ['name' => 'Admin User', 'password' => Hash::make('password')]
        );

        // Create several demo users for demonstration (customers/operators)
        User::factory()->count(4)->create();

        // Seed demo shipments and status updates
        $this->call(LogisticsDemoSeeder::class);

        // Additional shipments to populate list views and cards
        \App\Models\Shipment::factory()->count(8)->create();
    }
}
