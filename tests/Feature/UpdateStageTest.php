<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateStageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('http://goionictask.test/api/update-stage', ["externalId" => "1", "stage" => "searched"]);

        $response->assertStatus(204);
    }
}