<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private User $admin;

    protected function setUp(): void 
    {
        parent::setUp();

        $this->user = $this->createUser();
        $this->admin = $this->createUser('admin');
    }

    public function test_unauthenticated_user_should_be_redirected_to_a_not_an_admin_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertRedirectToRoute('non.admin.user');
    }

    public function test_non_admin_user_should_be_redirected_to_a_not_an_admin_page(): void
    {
        $response = $this->actingAs($this->user)->get('/');

        $response->assertStatus(302);
        $response->assertRedirectToRoute('non.admin.user');
    }

    public function test_admin_user_should_be_redirected_to_dashboard_page_when_accessing_the_not_an_admin_page(): void
    {
        $response = $this->actingAs($this->admin)->get('/not-an-admin');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
