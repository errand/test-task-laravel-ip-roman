<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenerateTokenTest extends TestCase
{

    public function test_the_token_generation(): void
    {
        $this->artisan('token:generate editor@test.test asdfasdf')->assertSuccessful();

    }

    public function test_the_token_generation_falure(): void
    {
        $this->artisan('token:generate test@test.test asdfasdfsdf')->assertExitCode(0);
    }
}
