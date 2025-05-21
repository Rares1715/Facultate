<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $services = ['Tuns', 'Barba', 'Vopsit', 'Ras', 'Hair Styling', 'Pachet'];
        $prices = [25.00, 15.00, 50.00, 20.00, 35.00, 75.00];
        $serviceIndex = array_rand($services);

        return [
            'client_name' => $this->faker->name(),
            'service' => $services[$serviceIndex],
            'time' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'status' => $this->faker->randomElement([
                Reservation::STATUS_CONFIRMED,
                Reservation::STATUS_PENDING,
                Reservation::STATUS_CANCELLED
            ]),
            'price' => $prices[$serviceIndex],
        ];
    }

    /**
     * Indicate that the reservation is confirmed.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function confirmed()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Reservation::STATUS_CONFIRMED,
            ];
        });
    }

    /**
     * Indicate that the reservation is pending.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function pending()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Reservation::STATUS_PENDING,
            ];
        });
    }

    /**
     * Indicate that the reservation is cancelled.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function cancelled()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Reservation::STATUS_CANCELLED,
            ];
        });
    }
}
