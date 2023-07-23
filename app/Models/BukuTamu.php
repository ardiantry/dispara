<?php

namespace App\Models;

use Hashids\Hashids;
use App\Models\TamuPostVisit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BukuTamu extends Model
{
    use HasFactory;
    protected $guarded = ['id'], $table = 'buku_tamus';
    protected $pivotColumns = ['visited_at'];

    public function getIdAttribute()
    {
        $hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));

        return $hashids->encode($this->attributes['id']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lastVisitedPosts(): BelongsToMany
    {
        return $this->belongsToMany(Wisata::class, 'tamu_post_visits', 'wisata_id', 'tamu_id')
            ->withPivot('visited_at')
            ->orderBy('tamu_post_visits.created_at', 'desc')
            ->limit(3);
    }

    public function lastVisitedBeritas(): BelongsToMany
    {
        return $this->belongsToMany(Berita::class, 'berita_recents', 'berita_id', 'tamu_id')
            ->withPivot('visited_at')
            ->orderBy('berita_recents.created_at', 'desc')
            ->limit(3);
    }

    public function lastVisitedEvents(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'event_recents', 'event_id', 'tamu_id')
            ->withPivot('visited_at')
            ->orderBy('event_recents.created_at', 'desc')
            ->limit(3);
    }

    public function lastVisitedArtikels(): BelongsToMany
    {
        return $this->belongsToMany(Artikel::class, 'artikel_recents', 'artikel_id', 'tamu_id')
            ->withPivot('visited_at')
            ->orderBy('artikel_recents.created_at', 'desc')
            ->limit(3);
    }
}
