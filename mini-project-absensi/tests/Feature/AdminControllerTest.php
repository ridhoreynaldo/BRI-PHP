<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\AdminController;

class AdminControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function it_success_create_code(){
    //     $controller = new AdminController();
    //     $result = $controller->store();
    //     $this->assertEquals(200, $result->getStatusCode());
    // }
}
