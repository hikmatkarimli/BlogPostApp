<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\BlogPost;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function user()
    {
        return User::factory()->create();
    }

    protected function blogPost()
    {
        return BlogPost::factory()->create([
            'user_id' => $this->user()->id
        ]);
    }
}