<?php

namespace Tests\Feature;

use App\Models\KontenBeranda;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminHeroImagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_upload_three_hero_images(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.hero.update'), [
            'judul' => 'Hero Title',
            'subjudul' => 'Hero Subtitle',
            'konten' => 'Contact Us',
            'gambar' => UploadedFile::fake()->create('hero-1.jpg', 100, 'image/jpeg'),
            'gambar_2' => UploadedFile::fake()->create('hero-2.jpg', 100, 'image/jpeg'),
            'gambar_3' => UploadedFile::fake()->create('hero-3.jpg', 100, 'image/jpeg'),
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Hero Banner berhasil diperbarui!');

        $hero = KontenBeranda::where('bagian', 'hero')->where('kunci', 'hero_main')->first();

        $this->assertNotNull($hero);
        $this->assertNotNull($hero->path_gambar);
        $this->assertNotNull($hero->path_gambar_2);
        $this->assertNotNull($hero->path_gambar_3);
        $this->assertStringContainsString('uploads/hero', $hero->path_gambar);
        $this->assertStringContainsString('uploads/hero', $hero->path_gambar_2);
        $this->assertStringContainsString('uploads/hero', $hero->path_gambar_3);
    }
}
