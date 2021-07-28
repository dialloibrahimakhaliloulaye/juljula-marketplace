@extends('layouts.app')
@section('content')
    <div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('ads/sidebar')
            </div>
            <div class="col-md-9">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        @foreach($errors->all() as $errorsMessage)
                            <li>{{$errorsMessage}}</li>
                        @endforeach
                    </div>
                @endif
                <form action="{{route('ads.update', [$ad->id])}}" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">Modifier votre annonce</div>
                        <div class="card-body">
                            <label for="file" class="mt-2"><b>Télécharger 3 images</b></label>
                            <div class="form-inline form-group mt-1">
                                <div class="col-md-4">
                                    <first-image/>
                                </div>
                                <div class="col-md-4">
                                    <second-image/>
                                </div>
                                <div class="col-md-4">
                                    <third-image/>
                                </div>
                            </div>
                            <label for="file" class="mt-2"><b>Choisir une catégorie</b></label>
                            <div class="form-inline form-group mt-1">
                                <category-dropdown/>
                            </div>
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" class="form-control" name="name" value="{{$ad->name}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="7">{{$ad->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Prix</label>
                                <input type="text" class="form-control" name="price" value="{{$ad->price}}">
                            </div>
                            <div class="form-group">
                                <label for="">Status du Prix</label>
                                <select name="price_status" id="" class="form-control">
                                    <option value="">Choisir</option>
                                    <option value="negociable" {{$ad->price_status=="negociable"?'selected':''}}>Négociable</option>
                                    <option value="derniere_prix" {{$ad->price_status=="derniere_prix"?'selected':''}}>Dernière prix</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Condition du produit</label>
                                <select name="product_condition" id="" class="form-control">
                                    <option value="">Choisir</option>
                                    <option value="tout_neuf" {{$ad->product_condition=="tout_neuf"?'selected':''}}>Tout neuf</option>
                                    <option value="occasion" {{$ad->product_condition=="occasion"?'selected':''}}>Occasion</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="location">Lieu (adresse)</label>
                                <input type="text" class="form-control" name="listing_location" value="{{$ad->listing_location}}">
                            </div>
                            <div class="form-group">
                                <label for="">Téléphone du vendeur</label>
                                <input type="number" class="form-control" name="phone_number" value="{{$ad->phone_number}}">
                            </div>
                            <div class="form-group">
                                <label for="">Lien (youtube) visualisation du produit</label>
                                <input type="text" class="form-control" name="link" value="{{$ad->link}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Mettre à jour</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
