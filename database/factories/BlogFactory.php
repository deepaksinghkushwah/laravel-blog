<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $para = $this->faker->paragraphs(10);
        $content = "";
        foreach($para as $p){
            $content .= "<p>".$p."</p>";
        }
        return [
            'title' => $this->faker->sentence(14),
            'content' => $content,
            'created_by' => User::all()->random()->id,
            'image' => 'noimg.png',
        ];
    }
}
