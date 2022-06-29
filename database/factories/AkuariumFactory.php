<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Akuarium>
 */
class AkuariumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_ikan' => $this->faker->sentence(mt_rand(2,3)),
            'slug' => $this->faker->slug(2),
            'jumlah_ikan' => $this->faker->numberBetween(20,150),
            'harga_ikan' => $this->faker->numberBetween(2000, 10000),
            'kode_akuarium' => $this->faker->unique()->numerify('ABC-##'),
            'kategori_id' => mt_rand(1, 3)
        ];
    }
}
