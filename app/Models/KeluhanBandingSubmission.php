<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeluhanBandingSubmission extends Model
{
    protected $table = 'keluhan_banding_submissions';
    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'jenis',
        'pesan',
        'status',
        'catatan_admin',
        'nama_perusahaan',
        'kota',
        'alamat',
        'telepon_perusahaan',
        'email_perusahaan',
        'nama_perwakilan',
        'jabatan',
        'telepon_perwakilan',
        'email_perwakilan',
        'path_dokumen'
    ];
    protected $casts = ['status' => 'string'];

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => 'Pending',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
            default => $this->status,
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'diproses' => 'bg-blue-100 text-blue-800',
            'selesai' => 'bg-green-100 text-green-800',
            'ditolak' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}
