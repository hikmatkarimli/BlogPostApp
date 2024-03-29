<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(10),
            'content'=>$this->faker->paragraphs(5,true),
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
        ];
    }

    public function states()     
    {         
        return $this->state([
                'title' => 'New title',
                'content' => 'Content of the blog post'
         ]);     
    }
}
