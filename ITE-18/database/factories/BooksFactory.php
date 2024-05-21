<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author' => fake()->name(),
            'title' => fake() -> word(),
            // 'image' => fake()-> image('C:\Users\msu-wone\Desktop\Laravel_API\Html\uploads'),
            'published_at' => fake()->dateTime(),
            'category' => fake()->word(),
            'description'=>fake()->text()
        ];
    }
}
