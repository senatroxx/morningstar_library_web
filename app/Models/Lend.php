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
        'shipping_courier',
        'return_courier',
        'shipping_receipt',
        'return_receipt',
        'status',
        'total_fine',
        'returned',
        'user_id',
        'user_address_id',
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

    public function lendReports()
    {
        return $this->hasMany(LendReport::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'lend_items');
    }

    public function userAddress()
    {
        return $this->belongsTo(UserAddress::class);
    }
}
