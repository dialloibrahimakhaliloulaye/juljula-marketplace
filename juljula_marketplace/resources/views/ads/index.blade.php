@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('ads/sidebar')
            </div>
            <div class="col-md-9">
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
                        <td><img src="{{Storage::url($ad->first_image)}}" width="130"></td>
                        <td>{{$ad->name}}</td>
                        <td style="color: blue"><b>{{$ad->price}} FCFA</b></td>
                        <td>
                            @if($ad->published ==1 )
                                <span class="badge badge-success">Publiée</span>
                            @else
                                <span class="badge badge-danger">En cours</span>
                            @endif
                        </td>
                        <td><button class="btn btn-secondary">Editer</button></td>
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
