@extends('layouts.index')
@section('content')
<div id="titlebar">
   <div class="row">
      <div class="col-md-12">
         <h2>Liste des Paiements </h2>
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
                   <th width="15%">Client</th>
                   <th width="20%">Dernier paiement (Dhs)</th>
                   <th width="15%">Montant (Dhs)</th>
                   <th width="15%">Reste (Dhs)</th>
                   <th width="10%">Date</th>
                   <th width="15%">Action</th>
                 </tr>
               </thead>
               <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown button
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </td>
                </tr>
               </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</div>
@stop