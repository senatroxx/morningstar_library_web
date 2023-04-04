<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title . ' ' . Str::random(6));
        });
    }

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'quantity',
        'publisher_id',
        'published_at',
    ];

    // cast to date
    protected $dates = [
        'published_at' => 'date:Y-m-d',
    ];

    public function scopeLike($query, $field, $value)
    {
        return $query->where($field, 'LIKE', "%$value%");
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories');
    }
}
