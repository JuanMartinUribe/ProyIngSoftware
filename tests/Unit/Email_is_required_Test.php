<?php

namespace Tests\Unit;

use Tests\TestCase;

class Email_is_required extends TestCase
{
    /** @test */
    public function test_email_is_required()
    {
        $credentials = [
            "email" => null,
            "password" => "secret"
        ];

        $response = $this->from('/login')->post('/login', $credentials);
        $response->assertRedirect('/login')->assertSessionHasErrors([
            'email' => 'The email field is required.',
        ]);
    }
}