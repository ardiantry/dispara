<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtikelRecent extends Model
{
    use HasFactory;
    protected $guarded = ['id'], $table = 'artikel_recents';

    public function getIdAttribute()
    {
        $hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));

        return $hashids->encode($this->attributes['id']);
    }

    public function tamu()
    {
        return $this->belongsTo(BukuTamu::class, 'tamu_id');
    }

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'artikel_id');
    }
}
