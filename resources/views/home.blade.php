@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <h1>Accueil</h1>
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Auth::user())
                <div class="card-header">Tableau de bord</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    Bonjour {{ Auth::user()->name }}, vous êtes connecté(e) !
                    <a id="nav-link" href="{{ route ('articles')}}">Articles publiés</a>
                    <a id="nav-link" href="{{ route ('createArticle')}}">Créer un article</a>
                    <a id="nav-link" href="{{ route ('profil', Auth::user()->id)}}">Accéder à mon profil</a>
                    @endif

                </div>
            </div>
            <div class="container">
                    <div class="row justify-content-center">
                        @foreach($articles as $article)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">{{$article->titre}} écrit par <a href="{{route('profil', $article->user->id)}}">{{$article->user->name}}</a></div>
                                        <div class="card-body">
                                            {{$article->contenu}}<br/><br/>
                                        <a href={{route('article', $article->id)}} class="btn btn-dark">Lire la suite</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

