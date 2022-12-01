@extends('layouts.index')
@section('content')
<div id="titlebar">
   <div class="row">
      <div class="col-md-12">
         <h2>Suivi des paiements</h2>
         @if(($cltService->montant-$totalPaiement) !=0)
         <a href="#"><button class="btn  btn-primary" style="position: relative;top: -40px;float: right;right: 20px;" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Ajouter</button></a>
         @endif
         <button class="btn  btn-primary" onclick="converHTMLFileToPDF()" style="position: relative;top: -40px;float: right;right: 30px;"> <i class="fas fa-file-pdf"></i> Générate PDF</button>
      </div>
   </div>
   <div class="row mt-4" id="temp-target">
   <div class="col-md-4"  >
        <div class="card shadow mb-4">
            <div class="card-header ">
                <label>Information Client</label>
            </div>
            <div class="card-body ">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nom : </b>{{$cltService->nom}}</li>
                    <li class="list-group-item"><b>Prenom : </b>{{$cltService->prenom}}</li>
                    <li class="list-group-item"><b>N° Téléphone : </b>{{$cltService->n_tele}} </li>
                    <li class="list-group-item"><b>C.I.N : </b> {{$cltService->cin}}</li>
                    <li class="list-group-item"><b>Service : </b> {{$cltService->title}}</li>
                    <li class="list-group-item"><b>Montant : </b> {{$cltService->montant}} Dhs</li>
                    <li class="list-group-item text-warning"><b>Avance : </b> {{$totalPaiement}} Dhs</li>
                    @if(($cltService->montant-$totalPaiement) !=0)
                    <li class="list-group-item text-danger"><b>Reste à payer : </b> {{$cltService->montant-$totalPaiement}} Dhs</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
     <div class="col-md-8" id="table">
       <div class="card shadow mb-4">
         <div class="card-body">
           <table class="table table-bordered" id="dataTable">
               <thead>
                 <tr>
                   <th width="5%">ID</th>
                   <th width="20%">Montant (Dhs)</th>
                   <th width="20%">Date</th>
                 </tr>
               </thead>
               <tbody>
                @foreach($paiements as $paiement)
                <tr>
                    <td>{{$paiement->id}}</td>
                    <td>{{$paiement->montant}}</td>
                    <td>{{date('Y-m-d', strtotime($paiement->date))}}</td>
                </tr>
                @endforeach
               </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter paiement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="" method="post">
                @csrf
                <label>Prix</label>
                <input class="form-control mb-4" type="text" name="prix" id="prix" required/> 
                <input type="hidden" name="action" value="addPaiement"/>
                <input type="hidden" name="idService" value="{{$idService}}"/>
                <input type="hidden" name="rest_paye" value="{{$cltService->montant-$totalPaiement}}"/>
                <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save" data-fa-transform="shrink-2 up-4"></i> Ajouter</button>
            </form>
      </div>
    </div>
  </div>
</div>
@stop