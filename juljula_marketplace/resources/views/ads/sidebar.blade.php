<div class="card">
    <div class="card-body">
        @if(!auth()->user()->avatar)
            <img src="/img/man.jpg" alt="" class="mx-auto d-block img-thumbnail" width="130">
        @endif
        @if(auth()->user()->avatar && !auth()->user()->fb_id)
            <img src="{{Storage::url(auth()->user()->avatar)}}" style="width: 100%;">
        @endif
        @if(auth()->user()->fb_id)
            <img src="{{auth()->user()->avatar}}" style="width: 100%;">
        @endif
        <p class="text-center"><b>{{auth()->user()->name}}</b></p>
    </div>
    <hr style="border: 2px solid green">
    <div class="vertical-menu">
        <a href="">Tableau de bord</a>
        <a href="{{route('profile')}}" class="{{request()->is('profile')?'active':''}}">Profile</a>
        <a href="{{route('ads.create')}}" class="{{request()->is('ads/create')?'active':''}}">Créer des annonces</a>
        <a href="{{route('ads.index')}}" class="{{request()->is('ads')?'active':''}}">Annonces publiées</a>
        <a href="{{route('saved.ad')}}" class="{{request()->is('saved.ad')?'active':''}}">Annonces enregistrées</a>
        <a href="{{route('messages')}}" class="{{request()->is('messages')?'active':''}}">Messages</a>
    </div>
</div>
