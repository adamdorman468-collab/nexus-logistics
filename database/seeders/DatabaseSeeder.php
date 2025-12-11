<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Admin user (can be used to login to admin panel)
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@nexus.com',
            'password' => bcrypt('password'),
        ]);

        // Create several demo users for demonstration (customers/operators)
        User::factory()->count(4)->create();

        // Seed demo shipments and status updates
        $this->call(LogisticsDemoSeeder::class);

        // Additional shipments to populate list views and cards
        \App\Models\Shipment::factory()->count(8)->create();
    }
}
