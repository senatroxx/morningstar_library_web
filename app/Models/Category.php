<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name . ' ' . Str::random(6));
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->name . ' ' . Str::random(6));
        });
    }

    protected $fillable = [
        'name',
        'slug',
    ];

    public function scopeLike($query, $field, $value)
    {
        return $query->where($field, 'LIKE', "%$value%");
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_categories');
    }
}
