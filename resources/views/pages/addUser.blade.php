@extends('layouts.index')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Ajouter l'utilisateur</h1>
<div class="row">
    <div class="col-md-6 offset-3">
        <div class="card shadow mb-4">
            <div class="card-header ">
                <label>Information l'utilisateur</label>
            </div>
            <div class="card-body ">
               <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nom_complet">Nom complet</label>
                        <input type="text" class="form-control" id="nom_complet" name="nom_complet" placeholder="Nom complet" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="tele">Rôle</label>
                        <select class="form-control" name="role" required>
                            <option></option>
                            <option value="admin">Admin</option>
                            <option value="invite">Inviter</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save" data-fa-transform="shrink-2 up-4"></i> Ajouter</button>

               </form>
            </div>
        </div>
    </div>
</div>
@stop