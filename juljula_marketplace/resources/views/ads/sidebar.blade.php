<div class="card">
    <div class="card-body">
        <img src="/img/man.jpg" alt="" class="mx-auto d-block img-thumbnail" width="130">
        <p class="text-center"><b>Khalil DIALLO</b></p>
    </div>
    <hr style="border: 2px solid green">
    <div class="vertical-menu">
        <a href="">Tableau de bord</a>
        <a href="">Profile</a>
        <a href="{{route('ads.create')}}" class="{{request()->is('ads/create')?'active':''}}">Créer des annonces</a>
        <a href="{{route('ads.index')}}" class="{{request()->is('ads')?'active':''}}">Annonces publiées</a>
        <a href="">Annonces en cours</a>
        <a href="">Message</a>
    </div>
</div>