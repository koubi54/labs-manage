@extends('layouts.index')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-4 text-gray-800">Dossier pour client #{{$client->id}}</h1>
@if(count($cltServices) == 0)
<form action="" method="post">
@csrf
<input type="hidden" name="idClient" value="{{$client->id}}"/>
<input type="hidden" name="action" value="deleteClt"/>
<button class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i> Suprimer</button>
</form>
@endif
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header ">
                <label>Information Client</label>
            </div>
            <div class="card-body ">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nom : </b>{{$client->nom}}</li>
                    <li class="list-group-item"><b>Prenom : </b>{{$client->prenom}}</li>
                    <li class="list-group-item"><b>N° Téléphone : </b> {{$client->n_tele}}</li>
                    <li class="list-group-item"><b>C.I.N : </b> {{$client->cin}}</li>
                    <li class="list-group-item"><b>Âge: </b> {{$client->age}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header ">
                <label>Les Service du client</label>
                <button type="button" class="btn btn-primary" style="position: relative;top: 0px;float: right;right: 20px;" data-toggle="modal" data-target="#exampleModal">
                   <i class="fas fa-plus"></i> Ajouter
                </button>
            </div>
            <div class="card-body">
            <table class="table table-bordered" id="dataTable">
               <thead>
                 <tr>
                   <th>ID</th>
                   <th>Service</th>
                   <th>Date début</th>
                   <th>Montant</th>
                   <th width="15%">Action</th>
                 </tr>
               </thead>
               <tbody>
                     @foreach($cltServices as $clts)
                     <tr>
                     <td>{{$clts->id}}</td>
                     <td>{{$clts->title}}</td>
                     <td>{{date('Y-m-d', strtotime($clts->date))}}</td>
                     <td>{{$clts->montant}} Dhs</td>
                     <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('detailService',['idService'=>$clts->idService])}}">Détails</a>
                                <a class="dropdown-item" href="{{route('addPaiement',['idService'=>$clts->idService])}}">Paiement</a>
                            </div>
                        </div>

                     </td>
                     </tr>
                     @endforeach
                  
               </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="" method="post">
                @csrf
                <label>Service</label>
                <select id="services" class="custom-select mb-4" name="service" required>
                    <option></option>
                    @foreach($services as $service)
                    <option value="{{$service->id}}" data-price="{{$service->price}}">{{$service->title}}</option>
                    @endforeach
                </select>
                <label>Prix</label>
                <input class="form-control mb-4" type="text" name="prix" id="prix" required/> 
                <input type="hidden" name="client" value="{{$client->id}}"/>
                <input type="hidden" name="action" value="addService"/>
                <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save" data-fa-transform="shrink-2 up-4"></i> Ajouter</button>
            </form>
      </div>
    </div>
  </div>
</div>

@stop