<?php

namespace Tests\Unit;

use Tests\TestCase;

class AdminTest extends TestCase
{
    /** @test */
    public function it_visit_page_of_login()
    {
        $response = $this->get('/admin');
        $response->assertStatus(302);
    }
}
