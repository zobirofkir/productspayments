<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRequestTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test Create User.
     */
    public function testCreateUser()
    {
        $users = [
            'name' => 'John Doe',
            'email' => 'zXm0y@example.com',
            'password' => 'password'
        ];

        $response = $this->post("api/users", $users);
        $response->assertStatus(201);
    }

    /**
     * Test Get Users
     */
    public function testGetUsers()
    {
        $response = $this->get("api/users");
        $response->assertStatus(200);
    }


    /**
     * Test Update User
     */
    public function testUpdateUser()
    {

        $users = User::factory()->create();
        
        $updateData = [
            "name" => "John Doe",
            "email" => "zXm0y@example.com",
            "password" => "password"
        ];

        $response = $this->put("api/users/$users->id", $updateData);

        $response->assertStatus(200);
    }

    /**
     * Test Show User
     */
    public function testShowUser()
    {
        $users = User::factory()->create();
        $response = $this->get("api/users/$users->id");
        $response->assertStatus(200);
    }

    /**
     * Test Delete User
     */
    public function testDeleteUser()
    {
        $users = User::factory()->create();
        $response = $this->delete("api/users/$users->id");
        $response->assertStatus(200);
    }
}
