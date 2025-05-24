<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'pertanyaan', 'jawaban', 'user_name'];
    public $timestamps = true;
}
