@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{Storage::url($advertisement->first_image)}}" width="430">
                        </div>
                        <div class="carousel-item">
                            <img src="{{Storage::url($advertisement->second_image)}}" width="430">
                        </div>
                        <div class="carousel-item">
                            <img src="{{Storage::url($advertisement->third_image)}}" width="430">
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
                <hr>
                <div>
                    <div class="card">
                        <div class="card-body">
                            <p>{!! $advertisement->description !!}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <p>Vidéo demo : </p>
                        {!! $advertisement->displayVideoFromLink() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1>{{$advertisement->name}}</h1>
                <p>Prix : <b>{{$advertisement->price}} FCFA</b>, {{$advertisement->price_status}}</p>
                <p>Postée : <b>{{$advertisement->created_at->diffForHumans()}}</b></p>
                <p>Condition du produit : <b>{{$advertisement->product_condition}}</b></p>
                @if(Auth::check())
                    @if(!$advertisement->didUserSavedAd() && auth()->user()->id!=$advertisement->user->id))
                    <save-ad
                        :ad-id="{{$advertisement->id}}"
                        :user-id="{{auth()->user()->id}}"
                    ></save-ad>
                    @endif
                @endif
                <hr>
                @if(!$advertisement->user->avatar)
                    <img src="/img/man.jpg" width="120">
                @else
                    <img src="{{Storage::url($advertisement->user->avatar)}}" width="130">
                @endif
                <p><a href="{{route('show.user.ads',[$advertisement->user_id])}}">{{$advertisement->user->name}}</a></p>
                <p>Adresse du vendeur : <b>{{$advertisement->listing_location}}</b></p>
                <p>
                    @if($advertisement->phone_number)
                        <show-phone-number :phone-number="{{$advertisement->phone_number}}"></show-phone-number>
                    @endif
                </p>
                <p>
                    @if(Auth()->check())
                        @if(auth()->user()->id!=$advertisement->user->id)
                            <message seller-name="{{$advertisement->user->name}}"
                                     :user-id="{{auth()->user()->id}}"
                                     :receiver-id="{{$advertisement->user->id}}"
                                     :ad-id="{{$advertisement->id}}"
                            ></message>
                        @endif
                    @endif
                    <span>
                        <a href="" class="" data-toggle="modal" data-target="#exampleModal">Signaler cette annonce</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{route('report.ad')}}" method="post">@csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Signaler cette annonce à notre equipe</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Choisir la raison</label>
                                                <select name="reason" id="" class="form-control">
                                                    <option value="">Choisir</option>
                                                    <option value="fraude">Fraude</option>
                                                    <option value="duplication">Duplication</option>
                                                    <option value="mauvaise-catégorie">Mauvaise catégorie</option>
                                                    <option value="offensive">Offensive</option>
                                                    <option value="autres">Autres</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Votre email</label>
                                                @if(auth()->check())
                                                    <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" readonly>
                                                @else
                                                    <input type="email" name="email" class="form-control">
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="">Votre message</label>
                                                <textarea name="message" id="" cols="30" rows="10" required
                                                          class="form-control"></textarea>
                                            </div>
                                            <input type="hidden" name="ad_id" value="{{$advertisement->id}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Envoyer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if(Session::has('message'))
                            <span class="alert alert-success">{{Session::get('message')}}</span>
                        @endif
                    </span>
                </p>
                    <hr>
                    <div id="disqus_thread"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        var disqus_config = function () {
                            this.language = "fr";
                        };
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://juljula.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </div>
        </div>
    </div>
@endsection
