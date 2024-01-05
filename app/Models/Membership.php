<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Membership extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name . ' ' . Str::random(6));
        });
    }

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'price',
        'balance',
        'discount_price',
        'max_borrow_count',
        'max_borrow_weeks',
        'fine_per_weeks',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }


}
