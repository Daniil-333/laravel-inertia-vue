<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];

    /**
     * Связь Многие-ко-многим между Tag и Video (через таблицу videos_tags)
     * @return BelongsToMany
     */
    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(Video::class);
    }
}
