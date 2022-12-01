<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Note;
use App\Models\Image;
class ServiceController extends Controller
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

    public function index(Request $request){
        if(Auth::user()->role != "admin"){
            return redirect()->route('lstClts');
        }
        if($request->method()=='POST'){
            switch ($request->input('action')) {
              case 'editeService':
                $service = Service::find($request->input('id'));
                $service->title = $request->input('title');
                $service->price = $request->input('price');
                $service->save();
                return redirect()->route('lstService');
              break;
            }
        }
        $services = Service::All();
        $serviceEdit = [];
        
        if(isset($_GET['edite']) && $_GET['edite'] == true){
            
            $serviceEdit = Service::where('id',$_GET['id'])->first();
        }
        return view('pages/listServices',['services'=>$services,'serviceEdit'=>$serviceEdit]);
    }
    public function add(Request $request){
        $service = new Service;
        $service->title  = $request->input('title');
        $service->price  = $request->input('price');
        $service->save();
        return redirect()->route('lstService');
    }
    
    public function details(Request $request){
        $id = $request->idService;
        if($request->method()=='POST'){
            switch ($request->input('action')) {
              case 'uploadImg':
                if($request->file()) {
                    $fileName = time().'_'.$request->file->getClientOriginalName();
                    $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                    $data     = ['type'=>1,'img'=>$filePath,'client_service_id'=>$id,'mineType'=>$request->file->getMimeType()];
                    DB::table('images')->insert($data);
                }
                break;
              case 'uploadImgFront':
                if($request->file()) {
                    $fileName = time().'_'.$request->file->getClientOriginalName();
                    $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                    $image = Image::where('client_service_id',$id)->where('type',2)->first();
                    if(is_null($image)){
                        $data     = ['type'=>2,'img'=>$filePath,'client_service_id'=>$id];
                        DB::table('images')->insert($data);
                    }else{
                        $image->img = $filePath;
                        $image->save();
                    }
                }
                break;
              case 'addNote':
                $note = new Note;
                $note->note              = $request->input('note');
                $note->client_service_id = $request->input('id');
                $note->save();
                break;

            }
        }
        $imagesType1 = Image::where('client_service_id',$id)->where('type',1)->get();
        $imagesType2 = Image::where('client_service_id',$id)->where('type',2)->first();
        $client        = DB::table('clients')
                       ->join('clients_services','clients.id','clients_services.client_id')
                       ->where('clients_services.id',$id)
                       ->select('clients.*')->first();
        $notes       = Note::where('client_service_id',$id)->get();
        return view('pages/details',['id'=>$id,'imagesType1'=>$imagesType1,'imagesType2'=>$imagesType2,'notes'=>$notes,'client'=>$client]);
    }
}