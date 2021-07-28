@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('ads.sidebar')
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Metter à jour le profile</div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="" method="post">@csrf
                    <div class="card">
                        <div class="card-header">changer de mot de passe</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Mot de passe en cours</label>
                                <input type="password" name="current_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nouveau mot de passe</label>
                                <input type="password" name="new_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Confirmer nouveau mot de passe</label>
                                <input type="password" name="confirm_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">Mettre à jour</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
