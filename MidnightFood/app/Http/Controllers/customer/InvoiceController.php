<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use App\Models\Cart;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        $lsCategories = Category::all();

        $details = $request->session()->get('lsCarts');
        $lsCarts=[];
        $total=0;

        foreach ($details as $item) {
           $lsCarts[]=[
                'product'=>Product::find($item['product_id']),
                'quantity'=>$item['quantity']
           ];
           $total+=Product::find($item['product_id'])->price*$item['quantity'];
        }

        return view('page.customer.checkout', [
            'lsCategories' => $lsCategories,
            'lsCarts'=>$lsCarts,
            'total'=>$total
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $details = $request->session()->get('lsCarts');

        $total=0;
        foreach ($details as $item) {
            $total+=Product::find($item['product_id'])->price*$item['quantity'];
        }

        $invoice = Invoice::create([
            'code' => time(),
            'user_id' => $request->user_id,
            'issued_date' => now(),
            'shipping_phone' => $request->shipping_phone,
            'shipping_address' => $request->shipping_address,
            'total' => $total
        ]);

        foreach ($details as $item) {
            InvoiceDetail::create([
                'invoice_id' => $invoice->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);

            $quantity = Product::find($item['product_id'])->quantity;
            Product::find($item['product_id'])->update(['quantity'=>$quantity-$item['quantity']]);
        }

        Cart::where('user_id', $request->user_id)->forceDelete();
        $request->session()->put('lsCarts', []);

        return redirect()->route('Home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
