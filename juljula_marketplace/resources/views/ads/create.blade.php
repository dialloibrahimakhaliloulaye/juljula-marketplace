@extends('layouts.app')
@section('content')
    <div>
        <exemple-component />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="/img/man.jpg" alt="" class="mx-auto d-block img-thumbnail" width="130">
                        <p class="text-center"><b>Khalil DIALLO</b></p>
                    </div>
                    <hr style="border: 2px solid green">
                    <div class="vertical-menu">
                        <a href="">Tableau de bord</a>
                        <a href="">Profile</a>
                        <a href="">Créer des annonces</a>
                        <a href="">Annonces publiées</a>
                        <a href="">Annonces en cours</a>
                        <a href="">Message</a>
                    </div>
                </div>
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
                                    <input type="file" name="first_image" accept="image/*">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" name="second_image" accept="image/*">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" name="third_image" accept="image/*">
                                </div>
                            </div>
                            <label for="file" class="mt-2"><b>Choisir une catégorie</b></label>
                            <div class="form-inline form-group mt-1">
                                <div class="col-md-4">
                                    <select class="form-control" name="category_id" id="">
                                        <option value="">Choisir la catégorie</option>
                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="subcategory_id" id="">
                                        <option value="">Choisir la sous-catégorie</option>
                                        @foreach(\App\Models\Subcategory::all() as $subcategory)
                                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="childcategory_id" id="">
                                        <option value="">Choisir la sous sous-catégorie</option>
                                        @foreach(\App\Models\Childcategory::all() as $childcategory)
                                            <option value="{{$childcategory->id}}">{{$childcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="7"></textarea>
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
    <style>
        .vertical-menu a {
            background-color: #fff;
            color: #000;
            display: block;
            padding: 12px;
            text-decoration: none;
        }

        .vertical-menu a:hover {
            background-color: green;
            color: #fff;
        }
    </style>
@endsection
