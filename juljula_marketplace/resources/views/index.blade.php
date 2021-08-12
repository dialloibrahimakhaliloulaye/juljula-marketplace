@extends('layouts.app')
@section('content')
    <div class="slider" style="margin-top: -25px">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/slider/slider1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/slider/slider2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/slider/slider3.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container mt-5">
        <h2>Top catégories</h2>
        <div class="row text-center mt-5">
            @foreach($categories as $category)
                <div class="col-lg-3 col-md-4 col-lg" id="categorie">
                    <a href="{{route('category.show', $category->slug)}}" class="d-block mb-4 h-100">
                        <img src="{{Storage::url($category->image)}}" class="img-fluid img-thumbnail" alt="">
                        <p>{{$category->name}}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-5">
        <span>
            <h2>Multimédia</h2>
            <a href="{{route('category.show', $category->slug)}}" class="float-right">View all</a>

        </span>
        <br>
        <div id="carouselExampleFade{{$category->id}}" class="carousel slide " data-ride="carousel" data-interval="4000">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="row">
                        @forelse($firstAds as $firstAd)
                            <div class="col-3">
                                <a href="{{route('ads.show', [$firstAd->id, $firstAd->slug])}}">
                                    <img src="{{Storage::url($firstAd->first_image)}}" class="img-thumbnail"
                                         style="min-height: 150px" width="170">
                                </a>
                                <p class="text-center  card-footer" style="color: blue;">
                                    {{$firstAd->name}} / {{$firstAd->price}} FCFA
                                </p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        @forelse($secondAds as $secondAd)
                            <div class="col-3">
                                <a href="{{route('ads.show', [$secondAd->id, $secondAd->slug])}}">
                                    <img src="{{Storage::url($secondAd->first_image)}}" class="img-thumbnail"
                                         style="min-height: 150px" width="170">
                                </a>
                                <p class="text-center  card-footer">
                                    {{$secondAd->name}} / {{$secondAd->price}} FCFA
                                </p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>


            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade{{$category->id}}" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade{{$category->id}}" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container mt-5">
        <span>
            <h2>Immobilier</h2>
            <a href="{{route('category.show', $categoryImmobiliers->slug)}}" class="float-right">View all</a>

        </span>
        <br>
        <div id="carouselExampleFade{{$categoryImmobiliers->id}}" class="carousel slide " data-ride="carousel" data-interval="4000">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="row">
                        @forelse($firstAdsForImmobiliers as $firstAdsForImmobilier)
                            <div class="col-3">
                                <a href="{{route('ads.show', [$firstAdsForImmobilier->id, $firstAdsForImmobilier->slug])}}">
                                    <img src="{{Storage::url($firstAdsForImmobilier->first_image)}}" class="img-thumbnail"
                                         style="min-height: 150px" width="170">
                                </a>
                                <p class="text-center  card-footer" style="color: blue;">
                                    {{$firstAdsForImmobilier->name}} / {{$firstAdsForImmobilier->price}} FCFA
                                </p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        @forelse($secondAdsForImmobiliers as $secondAdsForImmobilier)
                            <div class="col-3 " >
                                <a href="{{route('ads.show', [$secondAdsForImmobilier->id, $secondAdsForImmobilier->slug])}}">
                                    <img src="{{Storage::url($secondAdsForImmobilier->first_image)}}" class="img-thumbnail"
                                         style="min-height: 150px" width="170">
                                </a>
                                <p class="text-center  card-footer">
                                    {{$secondAdsForImmobilier->name}} / {{$secondAdsForImmobilier->price}} FCFA
                                </p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>


            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade{{$categoryImmobiliers->id}}" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade{{$categoryImmobiliers->id}}" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection

<style>
    #categorie a:hover{
        background-color: #30c93e;
        color: white;
    }
</style>
