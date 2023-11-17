<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mobil>
 */
class MobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // mobil : merek, model, no_plat, tarif, sts_sewa
        return [
            'merek' => $this->faker->userName(),
            'model' => $this->faker->userName(),
            'no_plat' => $this->faker->phoneNumber(),
            'tarif' => $this->faker->randomFloat(2, 1, 100),
            'sts_sewa' => $this->faker->boolean(),
            'tgl_awal' => null,
            'tgl_akhir' => null,
        ];
    }
}
