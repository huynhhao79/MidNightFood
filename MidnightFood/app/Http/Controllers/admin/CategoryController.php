<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsCategories = Category::all();
        return view('page.admin.categories.index', ['lsCategories'=> $lsCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.admin.categories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'unique:categories',
        ]);

        $data = $request->all();
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('img/categories'), $imageName);

        $data['image'] = $imageName;

        Category::create($data);

        return redirect()->route('categories.index');
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
            $category = Category::find($id);
            if($category){
                $lsProducts = $category->product;
                $lsCategories = Category::where('id','<>',$id)->get();
                return view('page.admin.categories.details',[
                    'category'=>$category,
                    'lsProducts'=>$lsProducts,
                    'lsCategories'=>$lsCategories
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
            $category = Category::find($id);
            if($category){
                return view('page.admin.categories.edit',[
                    'category'=>$category
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
        $category = Category::find($id);
        if($request->get('name') != $category->name){
            $this->validate($request,[
                'name'=>'unique:categories',
            ]);
        }

        if($request->image){
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/categories'), $imageName);

            $image_path = public_path("img/categories/{$category->image}");
            if (File::exists($image_path)) {
                unlink($image_path);
            }

            $category->image = $imageName;
        }

        $category->name= $request->name;
        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id || $id!=1){
            $category = Category::find($id);
            if($category){
                foreach ($category->product as $product) {
                    $product->category_id=1;
                    $product->save();
                }

                $image_path = public_path("img/categories/{$category->image}");
                if (File::exists($image_path)) {
                    unlink($image_path);
                }
                $category->forceDelete();
            }
        }
        return redirect()->back();
    }

    public function change(Request $request)
    {
        $product = Product::find($request->id);

        $product->category_id=$request->category_id;
        $product->save();

        return redirect()->back();
    }
}
