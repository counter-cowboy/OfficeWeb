<?php

namespace Database\Factories;

use App\Models\Keyvalue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class KeyvalueFactory extends Factory
{
    protected $model = Keyvalue::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'size' => $this->faker->word(),
            'color' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'composition' => $this->faker->word(),
            'quantity' => $this->faker->randomNumber(),
            'seo_title' => $this->faker->word(),
            'seo_h1' => $this->faker->word(),
            'seo_description' => $this->faker->text(),
            'product_weight' => $this->faker->randomNumber(),
            'product_width' => $this->faker->randomNumber(),
            'product_height' => $this->faker->randomNumber(),
            'product_length' => $this->faker->randomNumber(),
            'package_weight' => $this->faker->randomNumber(),
            'package_width' => $this->faker->randomNumber(),
            'package_height' => $this->faker->randomNumber(),
            'package_length' => $this->faker->randomNumber(),
            'product_category' => $this->faker->word(),
        ];
    }
}
