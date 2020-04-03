<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response = $this->get('/auth');
        $response->assertStatus(200);
        $response = $this->get('/registration');
        $response->assertStatus(200);

    }
}
