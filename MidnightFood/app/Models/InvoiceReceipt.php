<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceReceipt extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function lsDetail()
    {
        return $this->hasMany(InvoiceReceiptDetail::class,'receipt_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'code',
        'user_id',
        'issued_date',
        'total'
    ];

}
