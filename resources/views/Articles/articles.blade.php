@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <h1>Les Articles</h1>
</div>

<div class="container">
    <div class="card">
            <div class="card-header"><h2>Articles<h2></div>
        @foreach($articles as $article)
                <div class="card">
                    <div class="card-header last">
                        <div class="headerTitle">
                            <h3>{{$article->title}}</h3>
                        </div>    
                        <div class="headerIcon">
                            <a href={{route('article', $article->id)}} class="btn btn-dark">
                                <ion-icon name="eye"></ion-icon>
                            </a>
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
                            </div>
                                @endif
                            </div>
                    </div>
                </div>
        @endforeach
    </div>
</div>
@endsection

