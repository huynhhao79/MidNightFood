<?php


namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page=1)
    {
        $page = (int) $page;
        $lsProducts = Product::skip(($page-1)*16)->take(16)->get();
        $lsCategories = Category::all();

        $max = Product::max('price');
        $min = Product::min('price');

        return view('page.customer.shop', [
            'all' => count(Product::all()),
            'lsProducts' => $lsProducts,
            'lsCategories' => $lsCategories,
            'max' => $max,
            'min' => $min
        ]);
    }

    // public function search(Request $request)
    // {
    //     $text=$request->get('text');

    //     $lsProducts = Product::where('name', 'LIKE', '%'.$text.'%')
    //                         ->orWhere('decription', 'LIKE', '%'.$text.'%');
    //     $lsCategories = Category::all();

    //     return response()->json($lsProducts);

    //     // $max = $lsProducts->max('price');
    //     // $min = $lsProducts->min('price');
    //     // return view('page.customer.shop', [
    //     //     'all' => count($lsProducts->get()),
    //     //     'lsProducts' => $lsProducts->get(),
    //     //     'lsCategories' => $lsCategories,
    //     //     'max' => $max,
    //     //     'min' => $min
    //     // ]);
    // }

    public function getByCategory($id)
    {
        $lsProducts = Product::where('category_id', $id);
        $lsCategories = Category::all();
        $max = $lsProducts->max('price');
        $min = $lsProducts->min('price');
        return view('page.customer.shop', [
            'all' => count($lsProducts->get()),
            'lsProducts' => $lsProducts->get(),
            'lsCategories' => $lsCategories,
            'max' => $max,
            'min' => $min
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lsCategories = Category::all();

        $product = Product::find($id);
        if ($product==null){
            return redirect()->route('Shop');
        }

        $numOrder =0;
        $x = Invoice::where('status', 1);
        foreach($x as $item){
            $numOrder+=$item->lsDetail->where('product_id', $id)->groupBy('product_id')->sum('quantity');

        }

        $lsRelated = Product::where('category_id', $product->category_id)->where('id', '<>', $product->id)->get();
        return view('page.customer.shopdetails', [
            'product' => $product,
            'lsCategories' => $lsCategories,
            'numOrder' => $numOrder,
            'lsRelated' => $lsRelated,
        ]);
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
