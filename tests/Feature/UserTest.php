<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Test if userlist page is available
     *
     * @return void
     */
    public function test_user_list()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    /**
     * Test if existing user returns the right http status
     */
    public function test_existing_user()
    {
        $response = $this->get('/user/1');
        $response->assertStatus(200);
    }
    /**
     * Test if non existing user goes to page not found
     * or 404 status.
     */
    public function test_non_existing_user()
    {
        $response = $this->get('/user/99999');
        $response->assertStatus(404);
    }
}
