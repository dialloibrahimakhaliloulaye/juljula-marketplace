@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.inc.message')
            <h3>Ajouter une Sous-category</h3>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{route('subcategory.store')}}" method="post" >@csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Nom du sous-catégorie">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Choisir la catégorie</label>
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">sélectionner la catégorie</option>
                                        @foreach(App\Models\Category::all() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
