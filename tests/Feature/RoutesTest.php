<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutesTest extends TestCase
{

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function test_successful_response_on_objects(): void
    {
        $response = $this->get('/objects');

        $response->assertStatus(200);
    }

    public function test_successful_response_on_object_create(): void
    {
        $response = $this->get('/objects/create');

        $response->assertStatus(200);
    }

    public function test_successful_response_on_objects_edit(): void
    {
        $response = $this->get('/objects/edit');

        $response->assertStatus(200);
    }

    public function test_successful_response_on_objects_delete(): void
    {
        $response = $this->get('/objects/delete');

        $response->assertStatus(200);
    }
}
