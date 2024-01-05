<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LendReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'fine',
        'report_type',
        'bill_type',
        'status',
        'lend_id',
        'user_id',
        'book_id',
    ];

    public function lend()
    {
        return $this->belongsTo(Lend::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
