<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;

class TamuPostVisit extends Model
{
    use HasFactory, HasTimestamps;
    protected $table = 'tamu_post_visits';

    protected $guarded = ['id'];
    public function getIdAttribute()
    {
        $hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));

        return $hashids->encode($this->attributes['id']);
    }
    public function tamu()
    {
        return $this->belongsTo(BukuTamu::class, 'tamu_id');
    }

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'wisata_id');
    }
}
