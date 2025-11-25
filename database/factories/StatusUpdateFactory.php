<?php

namespace Database\Factories;

use App\Models\Shipment;
use App\Models\StatusUpdate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<StatusUpdate>
 */
class StatusUpdateFactory extends Factory
{
    protected $model = StatusUpdate::class;

    public function definition(): array
    {
        $status = $this->faker->randomElement(Shipment::STATUSES);

        return [
            'shipment_id' => Shipment::factory(),
            'location' => $this->faker->city(),
            'description' => $this->faker->optional()->sentence(),
            'status' => $status,
            'happened_at' => Carbon::now()->subMinutes($this->faker->numberBetween(10, 720)),
        ];
    }
}

