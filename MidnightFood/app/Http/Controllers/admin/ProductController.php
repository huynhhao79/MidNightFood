<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ImageProduct;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsProducts = Product::all();
        return view('page.admin.products.index', ['lsProducts'=> $lsProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsCategories = Category::all();
        return view('page.admin.products.create',[
            'lsCategories'=>$lsCategories
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'sku'=> Str::random(15),
            'name'=> $request->input('name'),
            'decription'=> $request->input('description'),
            'price'=> $request->input('price'),
            'category_id'=> $request->input('category_id'),
            'quantity'=>0,
         ]);

         ImageProduct::create([
            'product_id'=> $product->id,
            'image1'=> 'product-5.jpg',
            'image2'=>'product-5.jpg',
            'image3'=>'product-5.jpg',
            'image4'=>'product-5.jpg',
            'image5'=>'product-5.jpg',
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id){
            $product = Product::find($id);
            if($product){
                $lsProducts = Product::where('category_id',$product->category_id)->where('id','<>',$id)->get();
                return view('page.admin.products.details',[
                    'product'=>$product,
                    'lsProducts'=>$lsProducts,
                ]);
            }
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id){
            $product = Product::find($id);
            if($product){
                $lsCategories = Category::all();
                return view('page.admin.products.edit',[
                    'product'=>$product,
                    'lsCategories'=>$lsCategories
                ]);
            }
            return redirect()->back();
        }

        return redirect()->back();
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
        $product = Product::find($id);

        $product->name= $request->input('name');
        $product->price= $request->input('price');
        $product->category_id= $request->input('category_id');
        $product->decription= $request->input('description');

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id){
            $product = Product::find($id);
            if($product){
                $product->status=!$product->status;
                $product->save();
            }
        }
        return redirect()->back();
    }
}
