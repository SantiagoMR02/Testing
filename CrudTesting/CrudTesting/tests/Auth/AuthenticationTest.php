<?php

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class LoginTest extends BaseTestCase
{
    /**
     * Test to check if the login screen can be rendered.
     *
     * @return void
     */
    public function testLoginScreenCanBeRendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Test to check if users cannot authenticate with an invalid password.
     *
     * @return void
     */
    public function testUsersCannotAuthenticateWithInvalidPassword()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    /**
     * Test to check if users can logout.
     *
     * @return void
     */
    public function testUsersCanLogout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}

