<?php

namespace Tests\Feature;

use App\Models\Galeri;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientSectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_shows_client_photo_section(): void
    {
        Galeri::create([
            'kategori' => 'client',
            'judul' => 'Client Test',
            'path_gambar' => 'uploads/clients/test.png',
            'urutan' => 1,
            'status_aktif' => true,
        ]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('DAFTAR KLIEN');
    }
}
