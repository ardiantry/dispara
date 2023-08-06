<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KatagoriVirtual extends Model
{
    use HasFactory;

    protected $guarded = ['id'], $table = 'tb_katagori_ruangan';

    public function getIdAttribute()
    {
        $hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));

        return $hashids->encode($this->attributes['id']);
    }

     public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_autor_member');
    }
}
