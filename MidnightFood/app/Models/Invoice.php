<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lsDetail()
    {
        return $this->hasMany(InvoiceDetail::class);
    }

    protected $fillable = [
        'code',
        'user_id',
        'issued_date',
        'shipping_phone',
        'shipping_address',
        'total'
    ];


}
