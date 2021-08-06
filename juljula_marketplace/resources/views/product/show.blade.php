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
                            <p>{!! $advertisement->description !!}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <p>Vidéo demo : </p>
                        {!! $advertisement->displayVideoFromLink() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1>{{$advertisement->name}}</h1>
                <p>Prix : <b>{{$advertisement->price}} FCFA</b>, {{$advertisement->price_status}}</p>
                <p>Postée : <b>{{$advertisement->created_at->diffForHumans()}}</b></p>
                <p>Condition du produit : <b>{{$advertisement->product_condition}}</b></p>
                <hr>
                @if(!$advertisement->user->avatar)
                <img src="/img/man.jpg" width="120">
                @else
                    <img src="{{Storage::url($advertisement->user->avatar)}}" width="130">
                @endif
                <p>{{$advertisement->user->name}}</p>
                <p>Adresse du vendeur : <b>{{$advertisement->listing_location}}</b></p>
                <p>Téléphone : <b>{{$advertisement->phone_number}}</b></p>
                <span>
                    @if(Auth()->check())
                        @if(auth()->user()->id!=$advertisement->user->id)
                            <message seller-name="{{$advertisement->user->name}}"
                                 :user-id="{{auth()->user()->id}}"
                                 :receiver-id="{{$advertisement->user->id}}"
                                 :ad-id="{{$advertisement->id}}"
                            ></message>
                        @endif
                    @endif
                </span>
            </div>
        </div>
    </div>
@endsection
