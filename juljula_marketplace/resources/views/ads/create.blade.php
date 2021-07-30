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
                <form action="{{route('ads.store')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">Publier une annonce</div>
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
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="mytextarea" cols="30" rows="7"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Prix</label>
                                <input type="text" class="form-control" name="price">
                            </div>
                            <div class="form-group">
                                <label for="">Status du Prix</label>
                                <select name="price_status" id="" class="form-control">
                                    <option value="negociable">Négociable</option>
                                    <option value="derniere_prix">Dernière prix</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Condition du produit</label>
                                <select name="product_condition" id="" class="form-control">
                                    <option value="tout_neuf">Tout neuf</option>
                                    <option value="occasion">Occasion</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="location">Lieu (adresse)</label>
                                <input type="text" class="form-control" name="listing_location">
                            </div>
                            <div class="form-group">
                                <label for="">Téléphone du vendeur</label>
                                <input type="number" class="form-control" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label for="">Lien (youtube) visualisation du produit</label>
                                <input type="text" class="form-control" name="link">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Publier</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
