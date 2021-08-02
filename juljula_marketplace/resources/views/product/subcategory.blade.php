@extends('layouts.app')
@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color: forestgreen;">Filter ::
                    </div>
                    <div class="card-body">
                        @foreach($filterByChildcategories as $filterByChildcategory)
                            <p>
                                <a href="{{url()->current()}}/{{($filterByChildcategory->childcategory->slug)??''}}"><b>{{$filterByChildcategory->childcategory->name??''}}</b></a>
                            </p>
                        @endforeach


                    </div>

                </div>
                <br>
                <form action="{{url()->current()}}">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Prix minimum</label>
                                <input type="text" name="minPrice" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Prix maximum</label>
                                <input type="text" name="maxPrice" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Chercher</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @forelse($advertisements as $advertisement)
                        <div class="col-3">
                            <a href="{{route('ads.show', [$advertisement->id, $advertisement->slug])}}">
                                <img src="{{Storage::url($advertisement->first_image)}}" class="img-thumbnail">
                                <p class="text-center  card-footer" style="color: blue;">
                                    <b>{{$advertisement->name}} / {{$advertisement->price}} FCFA </b>
                                </p>
                            </a>
                        </div>


                    @empty
                        Désolé, il n'ya pas de produit pour cette séléction
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
