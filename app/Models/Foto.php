<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $hidden = [
        'id',
    ];

    protected $fillable = [
        'name',
        'deskripsi',
        'album',
        'lokasi_foto',
        'userId',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function albums()
    {
        $this->hasMany(Album::class);
    }
}
