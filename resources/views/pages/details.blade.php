@extends('layouts.index')
@section('content')
<div class="row">
      <div class="col-md-12">
         <h2>Suivi client</h2>
         <a href="{{route('detailsClt',['id'=>$client->id])}}"><button class="btn  btn-warning" style="position: relative;top: -40px;float: right;right: 20px;margin-right:20px;"><i class="fas  fa-arrow-left"></i> Dossier</button></a>
      </div>
   </div>
<div class="row">
   
    <div class="col-md-6">
    <div class="col-md-12">
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
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="wrapper">
                    <div class="container">
                        <div class="upload-container">
                        <div class="border-container">
                            <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="icons fa-4x">
                            <i class="fas fa-icons"></i>
                            </div>
                            <input type="file" id="file-upload" name="file" class="d-none" accept=".jpg, .png, .jpeg,.pdf" required="">
                            <p>Drag and drop files here, or
                            <a href="#" id="file-browser">browse</a> your computer.</p>
                            <input type="hidden" name="action" value="uploadImg">
                            <input type="hidden" name="id" value="{{$id}}">
                            <button type="submit" class="btn btn-primary mt-5"><i class="fas fa-save" data-fa-transform="shrink-2 up-4"></i> Enregistrer</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            @foreach($imagesType1 as $image)
            @if($image->mineType == "application/pdf")
            <div class="card mb-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{asset('storage/app/public/'.$image->img)}}" class="text-primary" target="_blank"><i class="fas fa-file-pdf"></i> Fichier PDF</a>
                        <a href="{{route('detailService',['idService'=>$id])}}?action=delete&id={{$image->id}}" style="float:right"><i class="fas  fa-trash text-danger"></i></a>
                    </li>
                    
                </ul>
                
            </div>
            @else
            <div class="card mb-4">
                <img class="card-img-top" src="{{asset('storage/app/public/'.$image->img)}}" alt="Card image cap">
                <a href="{{route('detailService',['idService'=>$id])}}?action=delete&id={{$image->id}}" style="position: absolute;right: 10px;top: 10px;background: #eee;padding: 5px 10px;border-radius: 50%;"><i class="fas  fa-trash text-danger"></i></a>
            </div>
            @endif
            @endforeach
    </div>
    <div class="col-md-6">
            <div class="card shadow mb-4">
                @if(is_null($imagesType2))
                <img class="card-img-top" src="{{asset('storage/imgs/img.jpg')}}" alt="Card image cap">
                @else
                <img class="card-img-top" src="{{asset('storage/app/public/'.$imagesType2->img)}}" alt="Card image cap">
                @endif
                <div class="card-body">
                    <div class="wrapper">
                    <div class="container">
                        @if(is_null($imagesType2))
                        <a href="{{asset('storage/imgs/img.jpg')}}" class="btn btn-secondary mb-5" download><i class="fas fa-download" data-fa-transform="shrink-2 up-4"></i> Télécharger</a>
                        @else
                        <a href="{{asset('storage/app/public/'.$imagesType2->img)}}" class="btn btn-secondary mb-5" download><i class="fas fa-download" data-fa-transform="shrink-2 up-4"></i> Télécharger</a>
                        @endif
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="file" id="file-upload" name="file" accept=".jpg, .png, .jpeg" required=""><br/>
                            <input type="hidden" name="action" value="uploadImgFront">
                            <button type="submit" class="btn btn-primary mt-5"><i class="fas fa-save" data-fa-transform="shrink-2 up-4"></i> Modifier</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            @foreach($notes as $note)
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="wrapper">
                    <div class="container">
                        <a href="{{route('detailService',['idService'=>$id])}}?action=deleteNote&id={{$note->id}}" style="float:right"><i class="fas  fa-trash text-danger"></i></a>
                        <p class="text-justify">{{$note->note}}</p>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="wrapper">
                    <div class="container">
                        <form method="post" action="">
                            @csrf
                            <label>Note :</label>
                            <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="6"></textarea>
                            <input type="hidden" name="action" value="addNote">
                            <input type="hidden" name="id" value="{{$id}}">
                            <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save" data-fa-transform="shrink-2 up-4"></i> Enregistrer</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</div>

@stop