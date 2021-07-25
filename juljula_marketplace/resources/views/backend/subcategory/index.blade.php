@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.inc.message')
            <h4>Gérer les sous-catégories</h4>
            <div class="row justify-content-center">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Catégorie</th>
                                        <th>Nom</th>
                                        <th>Editer</th>
                                        <th>Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($subcategories as $subcategory)
                                        <tr>
                                            <td class="category_{{$subcategory->category_id}}">{{$subcategory->category->name}}</td>
                                            <td>{{$subcategory->name}}</td>
                                            <td>
                                                <a href="{{route('subcategory.edit', [$subcategory->id])}}">
                                                    <button class="btn btn-sm btn-info"><i class="mdi mdi-table-edit"></i>
                                                    </button>
                                                </a>
                                                </form>
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal{{$subcategory->id}}">
                                                     <i class="mdi mdi-delete"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$subcategory->id}}" tabindex="-1"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{route('subcategory.destroy', $subcategory->id)}}" method="post">@csrf @method('DELETE')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmer la suppression</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Voulez vous vraiment supprimer "{{$subcategory->name}}", cette action est irreversible
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
                                        <td>Aucune sous-catégorie à afficher</td>
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
        td.category_1 {
            background-color: aliceblue;
        }
        td.category_2 {
            background-color: bisque;
        }
        td.category_3 {
            background-color: darkgray;
        }
        td.category_4 {
            background-color: darkslateblue;
        }
        td.category_5 {
            background-color: #4a5568;
        }
    </style>
@endsection
