<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    static function searchList($array, $search)
    {
      $result = array();
      foreach ($array as $key => $value)
      {
        foreach ($search as $k => $v)
        {
          if (!isset($value[$k]) || $value[$k] != $v)
          {
            continue 2;
          }

        }
        $result[] = $key;

      }
      return $result;
    }

    public function index()
    {
        // if(! Auth::check()){
        //     return redirect()->route('Login.form');
        // }
        $lsCategories = Category::all();
        $lsFeatured = new Collection();


        foreach ($lsCategories as $item) {
           $lsFeatured= $lsFeatured->merge(Product::where('category_id', $item->id)->take(4)->get());
        }

        return view('page.customer.index', [
            'lsCategories' => $lsCategories,
            'lsFeatured' => $lsFeatured,
        ]);
    }
    public function contact()
    {
        $lsCategories = Category::all();
        return view('page.customer.contact', [
            'lsCategories' => $lsCategories
        ]);
    }
}
