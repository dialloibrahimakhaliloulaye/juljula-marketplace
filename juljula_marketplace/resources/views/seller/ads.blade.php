@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body">
                        @if($user->avatar)
                            <img src="{{Storage::url($user->avatar)}}" width="120" alt="">
                        @else
                            <img src="/img/man.jpg" width="120" class="img-thumbnail" alt="">
                        @endif
                        <p>{{$user->name}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            @forelse($advertisement as $ads)
                                <div class="col-3">
                                    <a href="{{route('ads.show', [$ads->id, $ads->slug])}}">
                                        <img src="{{Storage::url($ads->first_image)}}" class="img-thumbnail"
                                             style="min-height: 150px" width="170">
                                    </a>
                                    <p class="text-center  card-footer" style="color: blue;">
                                        {{$ads->name}} / {{$ads->price}} FCFA
                                    </p>
                                </div>
                            @empty
                                <p>Vide</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                {{$advertisement->links()}}
            </div>
        </div>
    </div>
@endsection
