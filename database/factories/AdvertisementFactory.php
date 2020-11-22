<?php

namespace Database\Factories;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdvertisementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advertisement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = "ADVERTISEMENT-".$this->faker->sentence();
        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => $this->faker->paragraph(),
            'subcategory_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
