<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'judul', 'deskripsi', 'penulis', 'gambar', 'id_kategori'];
    public $timestamps = true;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function deleteimage()
    {
        if($this->gambar && file_exists(public_path('storage/berita' . $this->gambar))){
            return unlink(public_path('storage/berita' . $this->gambar));
        }
    }
}