@extends('layouts.index')
@section('content')
<div id="titlebar">
   <div class="row">
      <div class="col-md-12">
         <h2>Liste des clients </h2>
         <a href="{{route('addUser')}}"><button class="btn  btn-primary" style="position: relative;top: -40px;float: right;right: 20px;"><i class="fas fa-plus"></i> Ajouter</button></a>
      </div>
   </div>
   <div class="row">
     <div class="col-md-12">
       <div class="card shadow mb-4">
         <div class="card-body">
           <table class="table table-bordered" id="dataTable">
               <thead>
                 <tr>
                   <th>ID</th>
                   <th>Nom</th>
                   <th>Email</th>
                   <th>Rôle</th>
                 </tr>
               </thead>
               <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->nom_complet}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
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