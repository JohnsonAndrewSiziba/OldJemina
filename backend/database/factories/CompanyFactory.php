<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'symbol' => $this->faker->numberBetween(),
            'sector' => $this->faker->name(),
            'status' => 1,
            'isin_no' => $this->faker->word(),
            'year_end' => $this->faker->word(),
            'founded' => $this->faker->word(),
            'listed' => $this->faker->word(),
        ];
    }
}
