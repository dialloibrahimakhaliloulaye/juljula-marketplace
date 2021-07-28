@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('ads/sidebar')
            </div>
            <div class="col-md-9">
                @include('backend.inc.message')
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Status</th>
                        <th scope="col">Editer</th>
                        <th scope="col">Voir</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($ads as $key=>$ad)

                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td style="width: 200px; height: 130px">
                            <div id="carouselExampleIndicators{{$ad->id}}" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{Storage::url($ad->first_image)}}" width="130">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{Storage::url($ad->second_image)}}" width="130">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{Storage::url($ad->third_image)}}" width="130">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators{{$ad->id}}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators{{$ad->id}}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </td>
                        <td>{{$ad->name}}</td>
                        <td style="color: blue"><b>{{$ad->price}} FCFA</b></td>
                        <td>
                            @if($ad->published ==1 )
                                <span class="badge badge-success">Publiée</span>
                            @else
                                <span class="badge badge-danger">En cours</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('ads.edit', [$ad->id])}}"><button class="btn btn-secondary">Editer</button></a>
                        </td>
                        <td><button class="btn btn-info btn-primary">Voir</button></td>
                    </tr>
                    @empty
                        <td>Vous n'avez aucune annonce</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
