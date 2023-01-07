<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsUsers = User::where('is_admin', 1)->get();
        return view('page.admin.users.index', ['lsUsers'=> $lsUsers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.admin.users.create');
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
            'username'=>'unique:users',
        ]);

        $request = $request->all();
        $request['password'] = bcrypt($request['password']);

        $fullname = $request['firstname'].' '.$request['lastname'];

        User::create([
            'fullname'=> $fullname,
            'phone'=> $request['phone'],
            'email'=> $request['email'],
            'address'=> $request['address'],
            'username'=> $request['username'],
            'password'=>  $request['password'],
            'is_admin'=> true
        ]);

        return redirect()->route('staffs.index');
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
            $user = User::find($id);
            if($user){
                return view('page.admin.users.details',[
                    'staff'=>$user
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
            $user = User::find($id);
            if($user){
                return view('page.admin.users.edit',[
                    'staff'=>$user
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
        $user = User::find($id);
        if($request->get('username') != $user->username){
            $this->validate($request,[
                'username'=>'unique:users',
            ]);
        }

        $user->username = $request->get('username');
        if($request->get('password') != null){
            $user->password = bcrypt($request->get('password'));
        }
         $user->email = $request->get('email');
         $user->phone = $request->get('phone');
         $user->address = $request->get('address');
         $user->fullname = $request->get('fullname');

         $user->save();

         return redirect()->route('staffs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id || $id!=auth()->user()->id){
            $user = User::find($id);
            if($user){
                $user->delete();
            }
        }
        return redirect()->back();
    }
}
