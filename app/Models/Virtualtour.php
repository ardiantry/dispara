<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Virtualtour extends Model
{
    use HasFactory;
    protected $guarded = ['id'], $table = 'tb_ruang';


    // Hash ID
    public function getIdAttribute()
    {
        $hashids = new \Hashids\Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));

        return $hashids->encode($this->attributes['id']);
    }
}
