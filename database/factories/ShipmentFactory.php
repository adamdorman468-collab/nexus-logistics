<?php

namespace Database\Factories;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Shipment>
 */
class ShipmentFactory extends Factory
{
    protected $model = Shipment::class;

    public function definition(): array
    {
        $status = $this->faker->randomElement(Shipment::STATUSES);

        return [
            'tracking_number' => 'NXS-' . strtoupper(Str::random(3) . $this->faker->numerify('###')),
            'sender_name' => $this->faker->name(),
            'sender_phone' => $this->faker->phoneNumber(),
            'receiver_name' => $this->faker->name(),
            'receiver_phone' => $this->faker->phoneNumber(),
            'receiver_address' => $this->faker->streetAddress() . ', ' . $this->faker->city(),
            'status' => $status,
            'weight_kg' => $this->faker->randomFloat(2, 0.5, 20),
            'price' => $this->faker->numberBetween(25000, 250000),
        ];
    }
}

