<?php

namespace Tests\Feature;

use App\Models\Galeri;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GaleriUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_upload_gallery_image_without_category(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.galeri.store'), [
            'judul' => 'Foto Uji',
            'lokasi_tahun' => 'Jakarta 2026',
            'urutan' => 1,
            'gambar' => UploadedFile::fake()->create('gallery.jpg', 100, 'image/jpeg'),
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Foto Galeri berhasil ditambahkan!');

        $this->assertDatabaseHas('galeri', [
            'judul' => 'Foto Uji',
            'lokasi_tahun' => 'Jakarta 2026',
        ]);

        $this->assertTrue(Galeri::query()->where('judul', 'Foto Uji')->exists());
    }
}
