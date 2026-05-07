<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'apellidos' => 'Test Apellidos',
            'email' => 'test@example.com',
            'fecha_nacimiento' => '2000-01-01',
            'telefono' => '612345678',
            'telefono_codigo' => '+34',
            'envio_tipo_via' => 'Calle',
            'envio_nombre_via' => 'Gran Vía',
            'envio_numero' => '12',
            'envio_codigo_postal' => '28001',
            'envio_provincia' => 'Madrid',
            'envio_municipio' => 'Madrid',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }
}
