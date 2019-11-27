@extends('layouts.app')

@section('content')

<div class="container">
<div class="card">
    <div class="card-header">
        <h1>{{$article->titre}}</h1>
    </div>

    <div class="card-body">
        ({!! nl2br(e($article->contenu)) !!})<br/>
                </div>
    <div class="card-body"> 
        <a href={{route('profil', $article->user->id)}}>{{$article->user->name}}</a><br/>
        <p>&nbsp; Le &nbsp;{{$article->created_at}}</p>
    </div>
</div>
</div>
@endsection
