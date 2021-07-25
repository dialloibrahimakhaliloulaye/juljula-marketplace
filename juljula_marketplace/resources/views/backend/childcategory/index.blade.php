@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.inc.message')
            <h4>Gérer les sous sous-catégories</h4>
            <div class="row justify-content-center">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sous-catégorie</th>
                                        <th>Nom</th>
                                        <th>Editer</th>
                                        <th>Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($childcategories as $childcategory)
                                        <tr>
                                            <td class="subcategory_{{$childcategory->subcategory_id}}">{{$childcategory->subcategory->name}}</td>
                                            <td>{{$childcategory->name}}</td>
                                            <td>
                                                <a href="{{route('childcategory.edit', [$childcategory->id])}}">
                                                    <button class="btn btn-sm btn-info"><i class="mdi mdi-table-edit"></i>
                                                    </button>
                                                </a>
                                                </form>
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal{{$childcategory->id}}">
                                                     <i class="mdi mdi-delete"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$childcategory->id}}" tabindex="-1"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{route('childcategory.destroy', $childcategory->id)}}" method="post">@csrf @method('DELETE')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmer la suppression</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Voulez vous vraiment supprimer "{{$childcategory->name}}", cette action est irreversible
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
                                        <td>Aucune sous sous-catégorie à afficher</td>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        td.subcategory_1 {
            background-color: aliceblue;
        }
        td.subcategory_2 {
            background-color: bisque;
        }
        td.subcategory_3 {
            background-color: darkgray;
        }
        td.subcategory_4 {
            background-color: darkslateblue;
        }
        td.subcategory_5 {
            background-color: #4a5568;
        }
    </style>
@endsection
