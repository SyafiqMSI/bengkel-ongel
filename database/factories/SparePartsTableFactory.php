<?php

namespace Database\Factories;

use App\Models\SparePart;
use Illuminate\Database\Eloquent\Factories\Factory;

class SparePartsTableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SparePart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_spare_part' => $this->faker->unique()->numberBetween(1000, 9999),
            'nama_spare_part' => $this->faker->word,
            'stock_spare_part' => $this->faker->numberBetween(10, 50),
            'deskripsi' => $this->faker->word,
            'harga' => $this->faker->numberBetween(10000, 500000),
            'tanggal_masuk' => $this->faker->dateTimeThisYear,
        ];
    }
}
