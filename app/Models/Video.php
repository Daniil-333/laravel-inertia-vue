<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_desc',
        'description',
        'category_id'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: function (?string $value, array $attributes) {
                return Str::slug($attributes['title']);
            },
        );
    }

//    public function setTitleAttribute($value)
//    {
//        $this->attributes['title'] = $value;
//        $this->attributes['slug'] = Str::slug($value, '-');
//    }

    /**
     * Связь Один-ко-многим между Video & Category
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Связь Многие-ко-многим между Video & Tag (через таблицу videos_tags)
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
