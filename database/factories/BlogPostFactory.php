<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'blogPostTitle' => $this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'blogPostContent' => $this->faker->text($maxNbChars = 200),
            'blogPostIsHighlight' => $this->faker->randomElement($array = array('0', '1')),
            'id' => $this->faker->numberBetween(1,3)
        ];
    }
}
