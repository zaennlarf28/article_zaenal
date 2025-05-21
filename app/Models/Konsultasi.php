<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'judul', 'deskripsi', 'penulis', 'gambar'];
    public $timestamps = true;

    public function deleteimage()
    {
        if($this->gambar && file_exists(public_path('storage/konsultasi' . $this->gambar))){
            return unlink(public_path('storage/konsultasi' . $this->gambar));
        }
    }
}
