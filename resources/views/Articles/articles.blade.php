@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <h1>Les Articles</h1>
</div>

<div class="container cat">
    <div class="card">
        <ul>
            @foreach($categories as $category)
                <button><li>{{$category->name}}</li></button>
            @endforeach
        </ul>
    </div>
</div>
@foreach($articles as $article)
    <div class="container">
        <div class="card">
            <div class="card-header last">
                <div class="headerTitle">
                    <a href={{route('article', $article->id)}} class="btn btn-dark"><h3>{{$article->title}}</h3></a>
                </div>
                <div>    
                    <a href=" {{route('articlesCat', $article->category->name)}} ">{{$article->category->name}}</a>
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
        </div>
    </div>
        @endforeach
@endsection

