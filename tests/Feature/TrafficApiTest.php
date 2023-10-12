<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TrafficApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function get_api(): void
    {
        $response = $this->get('api/get-data');

        $response->assertStatus(200);
    }
}
