<?php

namespace Database\Factories;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Faker\Provider\File as Files;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $id = $this->faker->numberBetween(2, 21);

        return [
            'name' => $this->faker->text($maxNbChars = 25),
            'original_name' => $this->faker->text($maxNbChars = 25), 
            'path' => $this->faker->file('./storage/app'),        
            'user_id'  => $id,  
        ];
    }
}
