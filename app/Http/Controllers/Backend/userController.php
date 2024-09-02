<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        $title ="Dashboard E-Commerce";
        return view('backend.users.dashboard',compact('users','title'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // confirmed kuralı passwordCheck ile eşleştirir
        ]);

        $user = new User();
        $user->name= $request->username;
        $user->email= $request->email;
        $user->password=$request->password;
        $user->is_active= $request->isActive=="on" ? 1:0;
        $user->is_admin= $request->isAdmin=="on" ? 1:0;

        $user->save();

        return redirect('/users');
        //return redirect()->route('users');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users = User::all();

        $title =" E-Commerce Users";
        return view('backend.users.users',compact('users','title'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user =User::find($id);
        $title ="Kullanıcıyı düzenle";


        return view('backend.users.updateForm',compact('user','title'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user =User::find($id);
        $user->name=$request->username;
        $user->email=$request->email;
        $user->is_active=$request->isActive ? 1:0;
        $user->is_admin=$request->isAdmin ? 1:0;
        $user->save();


        return redirect('/users');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user =user::findOrFail($id);

        $user->delete();

        return redirect()->route('users');
    }
}
