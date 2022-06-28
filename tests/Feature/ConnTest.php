<?php
 
namespace Tests\Feature;
 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
 
class ConnTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_connection_status()
    {
	/* GET request */
        $response = $this->get('/');

	/* If the GET req status return val is 200 the test will succeed */
	/* otherwise it will fail */
        $response->assertStatus(200);
    }
}
