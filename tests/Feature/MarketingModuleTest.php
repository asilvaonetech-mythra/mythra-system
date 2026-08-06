<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MarketingModuleTest extends TestCase
{
    use RefreshDatabase;


    /**
     * Usuário autenticado acessa Marketing.
     */
    public function test_user_can_access_marketing_routes(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/marketing/campaigns');


        $response->assertStatus(200);
    }


    /**
     * Rotas exigem autenticação.
     */
    public function test_marketing_requires_authentication(): void
    {
        $response = $this->get(
            '/marketing/campaigns'
        );

        $response->assertRedirect();
    }
}