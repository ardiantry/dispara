<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventPengguna extends Model
{
    use HasFactory;
    protected $guarded = ['id'], $table = 'event_penggunas';

    public function getIdAttribute()
    {
        $hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));

        return $hashids->encode($this->attributes['id']);
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function tamu()
    {
        return $this->belongsTo(BukuTamu::class, 'tamu_id');
    }
}
