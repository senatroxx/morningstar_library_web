<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'finish_date',
        'returned',
        'user_id',
        'book_id',
    ];

    // cast to date
    protected $dates = [
        'start_date' => 'date:Y-m-d',
        'finish_date' => 'date:Y-m-d',
    ];

    protected $casts = [
        'returned' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
