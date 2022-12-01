<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Service;
class ClientController extends Controller
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
        $clients = Client::orderBy('created_at', 'desc')->get();
        return view('pages/listClient',['clients'=>$clients]);
    }

    public function add(Request $request){
      $client         = new Client;
      $client->nom    = $request->input('nom');
      $client->prenom = $request->input('prenom');
      $client->cin    = $request->input('cin');
      $client->n_tele = $request->input('tele');
      $client->age    = $request->input('age');
      $client->save();
      return redirect()->route('lstClts');
    }

    public function details(Request $request){
        if($request->method()=='POST'){
            switch ($request->input('action')) {
              case 'addService':
                $data = ["service_id"=>$request->input('service'),"client_id"=>$request->input('client'),"montant"=>$request->input('prix')];
                DB::table('clients_services')->insert($data);
                break;
              case 'deleteClt':
                $idClt = $request->input('idClient');
                Client::where('id',$idClt)->delete();
                return redirect()->route('lstClts');
                break;
            }
        }
        $client       = Client::where('id', $request->id)->first();
        $cltServices  = DB::table('services')
                        ->join('clients_services', 'services.id', '=', 'clients_services.service_id')
                        ->where('clients_services.client_id',$request->id)
                        ->select('services.*','clients_services.created_at as date','clients_services.montant as montant','clients_services.id as idService')
                        ->get();
        $services = Service::All();
        return view('pages/dossier',['client'=>$client,'services'=>$services,'cltServices'=>$cltServices]);
    }
}