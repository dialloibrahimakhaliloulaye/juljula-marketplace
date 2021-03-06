@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.inc.message')
            <h4>Gérer les annonces</h4>
            <div class="row justify-content-center">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Vendeur</th>
                                        <th>Image</th>
                                        <th>Nom</th>
                                        <th>Date publication</th>
                                        <th>Voir</th>
                                        <th>Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($ads as $ad)
                                        <tr>
                                            <td>
                                                @if($ad->user->avatar)
                                                    <img src="{{Storage::url($ad->user->avatar)}}" width="120">
                                                @else
                                                    <img src="/img/man.jpg" width="120">
                                                @endif
                                                    <a target="_blank" href="{{route('show.user.ads', $ad->user->id)}}">{{$ad->user->name}}</a>
                                            </td>
                                            <td><img src="{{Storage::url($ad->first_image)}}" alt=""></td>
                                            <td>{{$ad->name}}</td>
                                            <td>{{$ad->created_at->format('d-m-Y')}}</td>
                                            <td>
                                                <a target="_blank" href="{{route('ads.show', [$ad->id, $ad->slug])}}">
                                                    <button class="btn btn-sm btn-info"><i class="mdi mdi-details"></i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal{{$ad->id}}">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$ad->id}}" tabindex="-1"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{route('ads.destroy', $ad->id)}}" method="post">@csrf @method('DELETE')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmer la suppression</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Voulez vous vraiment supprimer "{{$ad->name}}", cette action est irreversible
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                                </div>
                                                            </div>
                                                        <form action="" method="post">@csrf @method('DELETE')
                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                    @empty
                                        <td>Aucune annonce à afficher</td>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $ads->links() }}
        </div>
    </div>
@endsection
