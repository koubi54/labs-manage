<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Paiement;
use Carbon\Carbon;
class HomeController extends Controller
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
        return view('pages/index');
    }
    public function dashboard(){
        if(Auth::user()->role != "admin"){
            return redirect()->route('lstClts');
        }
        $currentMonth = Carbon::now()->month;
        $total             = Paiement::sum('montant');
        $currentMonthTotal = Paiement::whereMonth('created_at','=', $currentMonth)->sum('montant');
        $clients           = Client::count();
        return view('pages/dashboard',['clients'=>$clients,'total'=>$total,'currentMonthTotal'=>$currentMonthTotal]);
    }
    public function login(){
        if(!Auth::user()){
            return view('pages/login');
        }
        return redirect('/');
    }
}