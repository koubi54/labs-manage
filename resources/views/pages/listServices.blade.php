@extends('layouts.index')
@section('content')
<div id="titlebar">
   <div class="row">
      <div class="col-md-12">
         <h2>Liste des Services </h2>
      </div>
   </div>
   <div class="row">
     <div class="col-md-6">
       <div class="card shadow mb-4">
         <div class="card-body">
           <table class="table table-bordered" id="dataTable">
               <thead>
                 <tr>
                   <th width="10%">ID</th>
                   <th>Service</th>
                   <th>Prix</th>
                   <th width="15%">Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{$service->id}}</td>
                    <td>{{$service->title}}</td>
                    <td>{{$service->price}} Dhs</td>
                    <td>
                           <a href="?edite=true&id={{$service->id}}" class="btn btn-primary" type="button">
                                Modifier
                           </a>
                    </td>
                    <!-- <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </td> -->
                </tr>
                @endforeach
               </tbody>
            </table>
        </div>
    </div>
    </div>
    @if(isset($_GET['edite']) && $_GET['edite'] == true)
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-body ">
               <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Service</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="service" value="{{$serviceEdit->title}}" required>
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="text" class="form-control" id="prix" name="price" placeholder="Ex:2000" value="{{$serviceEdit->price}}" >
                    </div>
                    <input type="hidden" name="id" value="{{$serviceEdit->id}}"/>
                    <input type="hidden" name="action" value="editeService"/>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save" data-fa-transform="shrink-2 up-4"></i> Modifier</button>

               </form>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-body ">
               <form action="{{route('addService')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Service</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="service" required>
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="text" class="form-control" id="prix" name="price" placeholder="Ex:2000">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save" data-fa-transform="shrink-2 up-4"></i> Ajouter</button>

               </form>
            </div>
        </div>
    </div>
    @endif
    </div>
</div>
@stop