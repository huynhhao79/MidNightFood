<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favourite;

class FavouriteController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function addFavourite(Request $request, $id)
    {
        if(!$request->session()->exists('lsFavourites')) {
            $request->session()->put('lsFavourites', []);
        }
        $request->session()->push('lsFavourites', $id);

        return redirect()->back();
    }

    public function deleteFavourite(Request $request, $id)
    {
        $lsFavourites = $request->session()->get('lsFavourites');

        foreach ($lsFavourites as $key => $value) {
            if($value==$id){
                $index = $key;
            }
        }
        unset($lsFavourites[$index]);
        count($lsFavourites)==0?
            $request->session()->put('lsFavourites', [])
            : $request->session()->put('lsFavourites', $lsFavourites);

        return redirect()->back();
    }

}
