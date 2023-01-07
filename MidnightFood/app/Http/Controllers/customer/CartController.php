<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listCarts(Request $request)
    {
        $lsCategories = Category::all();

        $lsCarts = $request->session()->has('lsCarts')?$request->session()->get('lsCarts'):[];

        $lsItems = [];

        $total = 0;
        foreach ($lsCarts as $key => $value) {
            $product = Product::findOrFail($value['product_id']);
            $lsItems[]=[
                'product' => $product,
                'quantity' => $value['quantity'],
                'price' => $product->price,
            ];
            $total+=$value['quantity']*$product->price;
        }

        return view('page.customer.shopcarts', [
            'lsCategories' => $lsCategories,
            'lsCarts' => $lsItems,
            'total' => $total
        ]);

    }

    public function addToCart(Request $request)
    {
        $item = $request->all();

        if(!$request->session()->exists('lsCarts')) {
            $request->session()->put('lsCarts', []);
            $request->session()->push('lsCarts', [
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                ]);
        }
        else {
            $lsCarts = $request->session()->get('lsCarts');

            $search = Controller::searchList($lsCarts, [
                'product_id' => $item['id'],
            ]);

            if(count($search) == 0){
                $request->session()->push('lsCarts', [
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                ]);
            }
            else{
                $lsCarts[ $search[0] ]['quantity'] += $item['quantity'];
                $request->session()->put('lsCarts', $lsCarts);
            }
        }

        return redirect()->back();
    }

    public function deleteCart(Request $request, $product_id)
    {
        $lsCarts = $request->session()->get('lsCarts');

        $search = Controller::searchList($lsCarts, [
            'product_id' => $product_id,
        ]);

        if(count($search) != 0){
            unset($lsCarts[$search[0]]);
            count($lsCarts)==0?
                $request->session()->put('lsCarts', [])
                : $request->session()->put('lsCarts', $lsCarts);
        }

        return redirect()->back();
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
