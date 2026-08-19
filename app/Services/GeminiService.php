<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    /**
     * Generate content using Google Gemini API.
     *
     * @param string $prompt
     * @return string|null
     */
    public static function generateText(string $prompt): ?string
    {
        $apiKey = config('services.gemini.api_key');

        if (empty($apiKey)) {
            Log::warning('Gemini API key is not set.');
            return 'Error: API Key Gemini belum dikonfigurasi di file .env';
        }

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.6-flash:generateContent?key={$apiKey}";

        // Tambahkan instruksi sistem agar AI tidak bertele-tele
        $systemInstruction = "Anda adalah asisten profesional untuk perusahaan PT PRADANA NUSA ENERGI. Tuliskan HANYA konten yang diminta tanpa kalimat pembuka (seperti 'Tentu, berikut adalah...'), tanpa pilihan ganda, dan tanpa basa-basi. Format dengan paragraf yang rapi dan profesional.";
        
        $finalPrompt = $systemInstruction . "\n\nPermintaan: " . $prompt;

        $payload = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $finalPrompt]
                    ]
                ]
            ],
            'generationConfig' => [
                'temperature' => 0.7,
                'maxOutputTokens' => 4096,
            ]
        ];

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($url, $payload);

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                    return trim($data['candidates'][0]['content']['parts'][0]['text']);
                }
            }

            Log::error('Gemini API Error Response', ['response' => $response->body()]);
            return 'Error: Gagal menghasilkan teks dari AI. Cek log untuk detail.';

        } catch (\Exception $e) {
            Log::error('Gemini API Exception', ['error' => $e->getMessage()]);
            return 'Error: Terjadi kesalahan koneksi ke server AI.';
        }
    }

    /**
     * Generate structured JSON data for Peralatan Ketenagalistrikan.
     *
     * @param string $prompt
     * @return array|string Returns an array if successful, string error message if failed.
     */
    public static function generatePeralatanData(string $prompt)
    {
        $apiKey = config('services.gemini.api_key');
        if (empty($apiKey)) return 'Error: API Key Gemini belum dikonfigurasi di file .env';

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.6-flash:generateContent?key={$apiKey}";

        $systemInstruction = "Anda adalah AI assistant ahli di bidang ketenagalistrikan. Anda harus menghasilkan informasi spesifikasi teknis peralatan ketenagalistrikan murni dalam format JSON. JANGAN merespon dengan teks apapun selain JSON valid. JSON harus memiliki kunci berikut:\n"
            . "- 'nama': Nama alat secara profesional (string)\n"
            . "- 'kategori': Kategori alat (string)\n"
            . "- 'jenis_alat': Jenis spesifik alat (string)\n"
            . "- 'model': Contoh merk atau model standar industri (string)\n"
            . "- 'deskripsi_singkat': Deskripsi fungsi alat dalam 2-3 kalimat (string)\n"
            . "- 'spesifikasi': Array berisi string dari fitur/spesifikasi teknis alat tersebut (array of strings)\n"
            . "- 'image_keyword': 1 sampai 2 kata kunci pencarian gambar bahasa Inggris yang paling spesifik untuk alat ini (misal: 'oscilloscope', 'earth tester') (string)\n\n"
            . "Hanya kembalikan JSON, tanpa blok markdown (```json).";

        $finalPrompt = $systemInstruction . "\n\nBerikan data untuk peralatan: " . $prompt;

        $payload = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $finalPrompt]
                    ]
                ]
            ],
            'generationConfig' => [
                'temperature' => 0.7,
                'maxOutputTokens' => 2048,
                'responseMimeType' => 'application/json', // Force JSON output mode if supported, otherwise standard prompt helps
            ]
        ];

        try {
            $response = Http::timeout(90)->withHeaders(['Content-Type' => 'application/json'])->post($url, $payload);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                    $jsonString = trim($data['candidates'][0]['content']['parts'][0]['text']);
                    // Remove markdown block if AI still includes it
                    $jsonString = preg_replace('/^```json\s*/', '', $jsonString);
                    $jsonString = preg_replace('/\s*```$/', '', $jsonString);
                    
                    $decoded = json_decode($jsonString, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        return $decoded;
                    }
                    Log::error('Gemini JSON decode error', ['string' => $jsonString, 'error' => json_last_error_msg()]);
                    return 'Error: Format data dari AI tidak valid.';
                }
            }
            Log::error('Gemini API Error Response', ['response' => $response->body()]);
            return 'Error: Gagal menghasilkan data.';
        } catch (\Exception $e) {
            Log::error('Gemini API Exception', ['error' => $e->getMessage()]);
            return 'Error: Koneksi ke AI gagal.';
        }
    }

    /**
     * Download an image based on a keyword using LoremFlickr and save it to storage.
     *
     * @param string $keyword
     * @return string|null Path to the saved image relative to storage/app/public, or null on failure.
     */
    public static function downloadImage(string $keyword)
    {
        try {
            $formattedKeyword = urlencode($keyword);
            $url = "https://image.pollinations.ai/prompt/{$formattedKeyword}?width=800&height=600&nologo=true";

            $response = Http::timeout(20)->get($url);

            if ($response->successful()) {
                $content = $response->body();
                $filename = 'peralatan/' . uniqid('peralatan_') . '.jpg';
                
                \Illuminate\Support\Facades\Storage::disk('public')->put('uploads/' . $filename, $content);
                
                return 'uploads/' . $filename;
            }
            return null;
        } catch (\Exception $e) {
            Log::error('Image Download Exception', ['error' => $e->getMessage()]);
            return null;
        }
    }
}
