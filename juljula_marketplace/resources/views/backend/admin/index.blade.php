@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card" style="background-color: #30c93e">
                            <div class="card-body text-center" style="color: white">
                                <i class="mdi mdi-account-multiple-outline"></i>
                                <p class="lead">Utilisateurs</p>
                                <p class="lead">{{\App\Models\User::count()}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="background-color: #30c93e">
                            <div class="card-body text-center" style="color: white">
                                <i class="mdi mdi-briefcase"></i>
                                <p class="lead">Annonces</p>
                                <p class="lead">{{\App\Models\Advertisement::count()}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="background-color: #30c93e">
                            <div class="card-body text-center" style="color: white">
                                <i class="mdi mdi-apps"></i>
                                <p class="lead">Catégories</p>
                                <p class="lead">{{\App\Models\Category::count()}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="background-color: #30c93e">
                            <div class="card-body text-center" style="color: white">
                                <i class="mdi mdi-dns"></i>
                                <p class="lead">Sous-catégories</p>
                                <p class="lead">{{\App\Models\Subcategory::count()}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="background-color: #30c93e">
                            <div class="card-body text-center" style="color: white">
                                <i class="mdi mdi-disqus-outline"></i>
                                <p class="lead">Sous Sous-catégories</p>
                                <p class="lead">{{\App\Models\Childcategory::count()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
