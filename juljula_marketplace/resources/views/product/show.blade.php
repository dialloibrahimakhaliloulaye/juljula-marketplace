@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{Storage::url($advertisement->first_image)}}" width="430">
                        </div>
                        <div class="carousel-item">
                            <img src="{{Storage::url($advertisement->second_image)}}" width="430">
                        </div>
                        <div class="carousel-item">
                            <img src="{{Storage::url($advertisement->third_image)}}" width="430">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <hr>
                <div>
                    <div class="card">
                        <div class="card-body">
                            <p>{{$advertisement->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1>{{$advertisement->name}}</h1>
                <p><b>Prix : {{$advertisement->price}} FCFA</b>, {{$advertisement->price_status}}</p>
                <p>Postée : {{$advertisement->created_at->diffForHumans()}}</p>
                <hr>
                <img src="/img/man.jpg" width="120">
                <p>Nom du vendeur</p>
            </div>
        </div>
    </div>
@endsection
