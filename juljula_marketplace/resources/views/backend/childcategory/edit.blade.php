@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.inc.message')
            <h3>Mettre à jour une sous sous-category</h3>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{route('childcategory.update', [$childcategory->id])}}" method="post" >@csrf
                                @method('PUT')
                                 <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{$childcategory->name}}">
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
                                            <option value="{{$subcategory->id}}" {{$childcategory->subcategory_id==$subcategory->id ? 'selected':''}}>{{$subcategory->name}}</option>
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
