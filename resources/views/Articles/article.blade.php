@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <h1>{{$article->titre}}</h1>
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body"> 
                    {{$article->contenu}}<br/>
                </div>
                <div class="card-body"> 
                        {{$article->user->name}}<br/>
                    </div>
            </div>
        </div> 
    </div>
</div>
@endsection
