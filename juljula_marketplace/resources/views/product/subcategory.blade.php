@extends('layouts.app')
@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color: forestgreen;">Filter ::</div>
                    <div class="card-body">
                        //loop
                        <p>
                            name
                        </p>
                        //endloop


                    </div>

                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @forelse($advertisements as $advertisement)
                    <div class="col-3">
                        <img src="{{Storage::url($advertisement->first_image)}}" class="img-thumbnail">
                        <p class="text-center  card-footer" style="color: blue;">
                            <b>{{$advertisement->name}} / {{$advertisement->price}} FCFA </b>
                        </p>
                    </div>


                    @empty
                        Désolé, il n'ya pas de produit pour cette séléction
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
