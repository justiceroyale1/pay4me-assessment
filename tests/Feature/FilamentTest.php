<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FilamentTest extends TestCase
{
    public function test_redirects_to_filament_login_page(): void
    {
        $response = $this->get('/');

        $response->assertRedirectToRoute('filament.admin.auth.login');
    }


    public function test_admin_can_access_filament_dashboard(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.pages.dashboard'));

        $response->assertOk();
    }

    public function test_non_admins_can_not_access_filament_dashboard(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.pages.dashboard'));

        $response->assertOk();
    }
}
