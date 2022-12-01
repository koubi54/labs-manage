<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use App\Models\Service;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        if(Auth::user()->role != "admin"){
            return redirect()->route('lstClts');
        }
        $users = User::orderBy('created_at', 'desc')->get();
        return view('pages/listUser',['users'=>$users]);
    }
    public function add(Request $request){
        if(Auth::user()->role != "admin"){
            return redirect()->route('lstClts');
        }
        if($request->method()=='POST'){
            $user = new User;
            $user->nom_complet = $request->input('nom_complet');
            $user->email       = $request->input('email');
            $user->role        = $request->input('role');
            $user->password    = Hash::make($request->input('password'));
            $user->save();
            return redirect()->route('lstUsers');
        }
        return view('pages/addUser');
    }
}