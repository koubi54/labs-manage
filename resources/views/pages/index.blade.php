@extends('layouts.index')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Ajouter client</h1>
<div class="row">
    <div class="col-md-6 offset-3">
        <div class="card shadow mb-4">
            <div class="card-header ">
                <label>Information Client</label>
            </div>
            <div class="card-body ">
               <form action="{{route('addClt')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="tele">N° Téléphone</label>
                        <input type="text" class="form-control" id="tele" name="tele" placeholder="0600000000" required>
                    </div>
                    <div class="form-group">
                        <label for="cin">N° C.I.N</label>
                        <input type="text" class="form-control" id="cin" name="cin" placeholder="N° C.I.N" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="Âge">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save" data-fa-transform="shrink-2 up-4"></i> Ajouter</button>

               </form>
            </div>
        </div>
    </div>
</div>
@stop