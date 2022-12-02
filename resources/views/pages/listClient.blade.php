@extends('layouts.index')
@section('content')
<div id="titlebar">
   <div class="row">
      <div class="col-md-12">
         <h2>Liste des clients </h2>
         <a href="{{route('addCltGET')}}"><button class="btn  btn-primary" style="position: relative;top: -40px;float: right;right: 20px;"><i class="fas fa-plus"></i> Ajouter</button></a>
      </div>
   </div>
   <div class="row">
     <div class="col-md-12">
       <div class="card shadow mb-4">
         <div class="card-body">
           <table class="table table-bordered" id="dataTableCLt">
               <thead>
                 <tr>
                   <th>ID</th>
                   <th>Nom</th>
                   <th>Prénom</th>
                   <th>Téléphone</th>
                   <th>C.I.N</th>
                   <th width="15%">Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->nom}}</td>
                    <td>{{$client->prenom}}</td>
                    <td>{{$client->n_tele}}</td>
                    <td>{{$client->cin}}</td>
                    <td>
                       <a href="{{route('detailsClt',['id'=>$client->id])}}" class="btn btn-secondary">
                        Crée un Dossier
                       </a>
                    </td>
                </tr>
                @endforeach
               </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</div>
@stop