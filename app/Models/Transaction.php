<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_id',
        'invoice_url',
        'invoice_id',
        'payment_method',
        'amount',
        'status',
        'user_id',
        'membership_id',
        'lend_id',
        'lend_report_id',
        'paid_at',
        'expired_at',
    ];

    protected $dates = [
        'paid_at',
        'expired_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function lend()
    {
        return $this->belongsTo(Lend::class);
    }

    public function lendReport()
    {
        return $this->belongsTo(LendReport::class);
    }

    public function scopeMembership($query)
    {
        return $query->whereNotNull('membership_id');
    }

    public function scopeLend($query)
    {
        return $query->whereNotNull('lend_id');
    }

    public function scopeLendReport($query)
    {
        return $query->whereNotNull('lend_report_id');
    }
}