@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <h1>Les Articles</h1>
</div>

<div class="container">
    <div class="row justify-content-center">
        @foreach($articles as $article)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{$article->titre}}</div>
                        <div class="card-body">
                            {{$article->contenu}}<br/><br/>
                        <a href={{route('article', $article->id)}} class="btn btn-dark">Lire la suite</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
