@extends('layouts.app')

@section('content')
    <div class="title">
        <h1>Accueil</h1>
    </div>

    @if(Auth::user())
        <div class="container home">
            <div class="card">
                <div class="card-header"><h2>Tableau de bord</h2></div>

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
                    </div>
                </div>
            </div>
        </div>
    @endif

    @foreach($articles->sortByDesc('created_at')->take(5) as $article)
        <div class="container">
            <div class="card">
                <div class="card-header last">
                    <div class="headerTitle">
                        <a href={{route('article', $article->id)}} class="btn btn-dark"><h3>{{$article->title}}</h3></a>
                    </div>
                    <div class="headerIcon">    
                        <p>{{$article->category->name}}</p>
                    </div>    
                </div>

                <div class="card-body last">
                    {{Str::limit($article->content, 150, '...')}}<br/><br/>
                                    
                    <div class="bottom">                                    
                        <div class="author">
                            <p>Ecrit par &nbsp;</p>
                            <a href=" {{route('profil', $article->user->id)}} ">{{$article->user->name}}</a>
                        </div>
                        <div class="date">
                            <p>&nbsp; le &nbsp;{{$article->created_at}}</p>
                            @if(  $article->created_at != $article->updated_at  )
                                <p>&nbsp; Mis à jour le &nbsp;{{$article->updated_at}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

