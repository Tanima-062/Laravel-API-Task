<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class MockResponseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testMockResponse()
    {
        $response->assertStatus(200);
        $response->assertJson(['status' => true]);
        $response->assert("accepted");
    }
}
