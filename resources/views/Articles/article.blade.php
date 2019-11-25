@extends('layouts.app')

@section('content')

<div class="container">
<div class="card">
    <div class="card-header">
        <h1>{{$article->titre}}</h1>
    </div>

    <div class="card-body">
        {!! $article->contenu !!}<br/>
                </div>
    <div class="card-body"> 
        <a href={{route('profil', $article->user->id)}}>{{$article->user->name}}</a><br/>
    </div>
</div>
</div>
@endsection
