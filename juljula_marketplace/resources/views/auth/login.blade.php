@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="text-center mt-2">
                        <h2>Se connecter</h2>
                        @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{route('login')}}" method="post">@csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">
                                    Email
                                </label>
                                <div class="col-md-6 ">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">
                                    Mot de passe
                                </label>
                                <div class="col-md-6 ">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                        {{old('remember')?'checked':''}}>
                                        <label for="label" class="form-check-label">Se souvenir de moi</label>
                                        <p><a href="{{route('password.request')}}">Mot de passe oubli?? !!!</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">Se connecter</button>
                                </div>
                            </div>
                            <hr>
                            <a href="{{url('auth/facebook')}}" style="color: blue">
                                Se connecter via facebook
                            </a>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
