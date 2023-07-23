<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriEvent extends Model
{
    use HasFactory;
    protected $guarded = ['id'], $table = 'kategori_events';

    public function getIdAttribute()
    {
        $hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));

        return $hashids->encode($this->attributes['id']);
    }

    public function events_postingan()
    {
        return $this->hasMany(Event::class, 'kategori_id');
    }
}
