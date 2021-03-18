<?php

namespace Database\Factories;

use App\Models\usterkimodel;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsterkiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = usterkimodel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
	    'place' => $this-> faker-> place,
	    'data' => $this->faker->data,
	    'deadline'=>$this->faker->deadline,
	    'tresc'=>$this->faker->tresc,
	    'autor'=>$this->faker->autor,
	    'status=>$this->faker->status,
        ];
    }
}
