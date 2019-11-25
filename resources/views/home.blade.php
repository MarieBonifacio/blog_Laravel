@extends('layouts.app')

@section('content')

    <div class="title">
        <h1>Accueil</h1>
    </div>

<div class="container">
            <div class="card">
                @if(Auth::user())
                <div class="card-header"><h2>Tableau de bord<h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <p>Bonjour {{ Auth::user()->name }}, vous êtes connecté(e) !</p>

                    <div id="navCard">
                        <a href="{{ route ('articles')}}"><ion-icon name="albums"></ion-icon></a>
                        <a href="{{ route ('createArticle')}}"><ion-icon name="create"></ion-icon></a>
                        <a href="{{ route ('profil', Auth::user()->id)}}"><ion-icon name="person"></ion-icon></a>
                    @endif
                    </div>

                </div>
            </div>
</div>
        <div class="container">
            <div class="card">
                    <div class="card-header"><h2>Derniers articles<h2></div>
                @foreach($articles as $article)
                        <div class="card">
                            <div class="card-header last"><h3>{{$article->titre}}</h3> écrit par <a href=" {{route('profil', $article->user->id)}} ">{{$article->user->name}}</a></div>
                                <div class="card-body last">
                                    {{$article->contenu}}<br/><br/>
                                <a href={{route('article', $article->id)}} class="btn btn-dark"><ion-icon name="eye"></ion-icon></a>
                            </div>
                        </div>
                @endforeach
            </div>
            {{-- <div class="container"> --}}
                   
                {{-- </div> --}}
</div>
@endsection

