@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Accueil</div>
                    <div class="card-body">
                        Bienvenue, {{auth()->user()->name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
