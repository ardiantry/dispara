<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriWisata extends Model
{
    use HasFactory;
    protected $guarded = ['id'], $table = 'kategori_wisatas';

    public function getIdAttribute()
    {
        $hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));

        return $hashids->encode($this->attributes['id']);
    }

    public function wisatas_postingan()
    {
        return $this->hasMany(Wisata::class, 'kategori_id');
    }
}
