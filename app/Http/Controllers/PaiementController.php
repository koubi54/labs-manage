<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PaiementController extends Controller
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
        return view('pages/listPaiement');
    }

    public function addPaiement(Request $request){
        $idService = $request->idService;
        $cltService  = DB::table('services')
                        ->join('clients_services', 'services.id', '=', 'clients_services.service_id')
                        ->join('clients', 'clients.id', '=', 'clients_services.client_id')
                        ->where('clients_services.id',$idService)
                        ->select('services.title','clients.id','clients.nom','clients.prenom','clients.n_tele','clients.cin','clients_services.montant')
                        ->first();
        if($request->method()=='POST'){
            switch ($request->input('action')) {
              case 'addPaiement':
                if($request->input('prix')<=$request->input('rest_paye')){
                    $data = ["montant"=>$request->input('prix')];
                    $idPaiement = DB::table('paiements')->insertGetId($data);
                    DB::table('clients_services_paiements')->insertGetId(['clients_services_id'=>$request->input('idService'),'paiement_id'=>$idPaiement]);
                }
                
                break;
            }
        }
        $paiements = DB::table('paiements')
                     ->join('clients_services_paiements', 'paiements.id', '=', 'clients_services_paiements.paiement_id')
                     ->join('clients_services', 'clients_services.id', '=', 'clients_services_paiements.clients_services_id')
                     ->where('clients_services.id',$idService)
                     ->select('paiements.id','paiements.montant','paiements.created_at as date')
                     ->distinct()
                     ->get();
        $totalPaiement = 0;
        foreach($paiements as $paiement){
            $totalPaiement += $paiement->montant;
        }
        return view('pages/paiement',['idService'=>$idService,'cltService' => $cltService,'paiements' => $paiements,'totalPaiement' => $totalPaiement]);
    }
}