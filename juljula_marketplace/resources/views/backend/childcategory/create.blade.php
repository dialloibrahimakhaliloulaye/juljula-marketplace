@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.inc.message')
            <h3>Ajouter une sous sous-category</h3>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{route('childcategory.store')}}" method="post" >@csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Nom du sous sous-catégorie">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Choisir la sous-catégorie</label>
                                    <select name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                                        <option value="">sélectionner la sous-catégorie</option>
                                        @foreach(App\Models\Subcategory::all() as $subcategory)
                                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
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
