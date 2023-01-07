<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Favourite;
use App\Models\Invoice;
use App\Http\Controllers\customer\UserController;
use App\Http\Controllers\customer\CartController;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerForm()
    {
        if(Auth::check()){
            return redirect()->route('Home');
        }

        $lsCategories = Category::all();
        return view('page.customer.register', [
            'lsCategories' => $lsCategories
        ]);
    }

    public function register(Request $request)
    {
        // $this->validate($request, [
        //     'email' => 'email|required',
        //     'password' => 'required',
        // ]);
        // $this->validate($request,[
        //     'username'=>'required|unique:users|max:255',
        //     'phone'=>'required|max:10|min:10'
        // ]);

        $request = $request->all();
        $pass= $request['password'];
        $request['password'] = bcrypt($request['password']);
        User::create($request);

        Auth::attempt([
            'username' => $request['username'],
            'password' => $pass,
        ]);

        // $user=User::where('username', $request['username'])->first();

        // $request->session()->put('user', $user);

        return redirect()->route('Home');

        // return redirect()->route('Login.form');
    }

    function loadCartSesstion (Request $request)
    {
        $user = $request->session()->get('user');

        $lsMyCarts = $user->cart ? $user->cart : [];

        if (!$request->session()->exists('lsCarts')) {
            $request->session()->put('lsCarts', $lsMyCarts);
        }
        else{
            $lsCarts = $request->session()->get('lsCarts');

            foreach ($lsMyCarts as $item) {
                $search = Controller::searchList($lsCarts, [
                    'product_id' => $item->product_id,
                ]);

                if(count($search) == 0){
                    $request->session()->push('lsCarts', [
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                    ]);
                }
                else{
                    $lsCarts[ $search[0] ]['quantity'] += $item->quantity;
                    $request->session()->put('lsCarts', $lsCarts);
                }
            }
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|exists:users',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator);
        }

         if(Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
            ]))
        {
            $user=User::where('username', $request->username)->first();

            $request->session()->put('user', $user);

            $this->loadCartSesstion($request);
            $this->loadFavSesstion($request);

            if($user->is_admin==0){
                return redirect()->back();
            }
            return redirect()->route('Dashboard');

        }
        return redirect()->back();
    }

    function updateCartDatabase(Request $request)
    {
        $user = $request->session()->get('user');

        $lsCarts = $request->session()->exists('lsCarts') ? $request->session()->get('lsCarts'): [] ;

        if(Cart::where('user_id', $user->id)->get()!= null)
            Cart::where('user_id', $user->id)->forceDelete();

        foreach ($lsCarts as $key => $value) {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $value['product_id'],
                'quantity' => $value['quantity'],
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $this->updateCartDatabase($request);
        $this->updateFavDatabase($request);

        $request->session()->flush();

        return redirect()->back();
    }

    function notInList($array, $search)
    {
      foreach ($array as $key => $value)
      {
            if($value==$search){
                return false;
            }
      }
      return true;
    }

    function loadFavSesstion (Request $request)
    {
        $user = $request->session()->get('user');

        $lsMyFavs = $user->favourite ? $user->favourite : [];

        if (!$request->session()->exists('lsFavourites')) {
            $request->session()->put('lsFavourites', []);
            foreach ($lsMyFavs as $item) {
                $request->session()->push('lsFavourites', $item->product_id);
            }
        }
        else{
            $lsFavs = $request->session()->get('lsFavourites');

            foreach ($lsMyFavs as $item) {
               if($this->notInList($lsFavs, $item->product_id)){
                    $request->session()->push('lsFavourites', $item->product_id);
               }
            }
        }
    }

    function updateFavDatabase(Request $request)
    {
        $user = $request->session()->get('user');

        $lsFavs = $request->session()->get('lsFavourites');

        if(Favourite::where('user_id', $user->id)->get()!= null)
            Favourite::where('user_id', $user->id)->forceDelete();

        foreach ($lsFavs as $key => $value) {
            Favourite::create([
                'user_id' => $user->id,
                'product_id' => $value,
            ]);
        }
    }

    public function myprofile(Request $request)
    {
        $lsFavs = $request->session()->get('lsFavourites');
        $lsItems = [];
        foreach ($lsFavs as $item) {
            $lsItems[]= Product::find($item);
        }

        $user = $request->session()->get('user');

        $lsInvoices = Invoice::where('user_id', $user->id)->orderBy('issued_date')->where('status','<>',2)->get();
        // return response()->json([
        //     $lsItems[0]->image
        // ]);
        return view('page.customer.myprofile', [
            'lsFavs' => $lsItems,
            'lsInvoices' => $lsInvoices
        ]);
    }

    public function updatepass(Request $request)
    {
        // if (Auth::attempt([
        //     'username' => auth()->user()->username,
        //     'password' => $request->get('oldpass')
        // ])){
        //     $this->validate($request,[
        //         'oldpass'=>'unique:users',
        //     ]);
        //     $request->session()->put('error', 'Old password not map');
        //     return view('page.customer.myprofile');
        // }
        // if($request->get('newpass')!=$request->get('confirmpass'))
        // {
        //     $request->session()->put('error', 'Confirm does not match password');
        //     return view('page.customer.myprofile');
        // }

        // $user = User::find(auth()->user()->id);
        // $user->password = bcrypt($request->get('newpass'));
        // $user->save();

        // $request->session()->forget('error');

        //  return redirect()->back();
    }

}
