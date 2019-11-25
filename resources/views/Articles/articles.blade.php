@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <h1>Les Articles</h1>
</div>

@foreach($articles as $article)
    <div class="container">
                <div class="card">
                    <div class="card-header"><h3>{{$article->titre}}</h3> écrit par <a href="{{route('profil', $article->user->id)}}">{{$article->user->name}}</a></div>
                        <div class="card-body">
                            {{$article->contenu}}<br/><br/>
                        <a href={{route('article', $article->id)}} class="btn btn-dark"><ion-icon name="eye"></a>
                    </div>
                </div>
        </div>
        @endforeach
</div>
@endsection
