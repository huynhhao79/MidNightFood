<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InvoiceReceiptDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function invoiceReceipt()
    {
        return $this->belongsTo(InvoiceReceipt::class, 'id', 'receipt_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected $fillable = [
        'receipt_id',
        'product_id',
        'quantity',
        'receipt_price'
    ];
}
