<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminHubungiKamiTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_save_hubungi_kami_settings(): void
    {
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->post(route('admin.hubungi-kami.update'), [
            'alamat_kantor' => 'Jl. Contoh No. 123',
            'telepon_whatsapp' => 'Office: (021) 1111-2222 | WA: +62 812-3456-7890',
            'email_resmi' => 'info@example.com',
            'jam_operasional' => 'Senin - Jumat: 08:00 - 17:00 WIB',
            'maps_embed' => 'https://maps.example.com/embed',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('konten_beranda', [
            'bagian' => 'hubungi_kami',
            'kunci' => 'alamat_kantor',
            'konten' => 'Jl. Contoh No. 123',
        ]);
        $this->assertDatabaseHas('konten_beranda', [
            'bagian' => 'hubungi_kami',
            'kunci' => 'telepon_whatsapp',
            'konten' => 'Office: (021) 1111-2222 | WA: +62 812-3456-7890',
        ]);
        $this->assertDatabaseHas('konten_beranda', [
            'bagian' => 'hubungi_kami',
            'kunci' => 'maps_embed',
            'konten' => 'https://maps.example.com/embed',
        ]);
    }
}
