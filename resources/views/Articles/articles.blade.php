@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <h1>Les Articles</h1>
</div>

<div class="container cat">
    <div class="card">
        <ul class="button-group filter-button-group">
            <li><button data-filter="*">Tout</button></li>
            @foreach($categories as $category)
                <li><button data-filter=".{{$category->name}}">{{$category->name}}</button></li>
            @endforeach
        </ul>
    </div>
</div>
<div class="grid" data-isotope='{ "itemSelector": ".element-item", "layoutMode": "vertical" }'>
    @foreach($articles->sortByDesc('created_at') as $article)
        <div class="container element-item transition {{$article->category->name}}">
            <div class="card">
                <div class="card-header last">
                    <div class="headerTitle">
                        <a href={{route('article', $article->id)}} class="btn btn-dark"><h3>{{$article->title}}</h3></a>
                    </div>
                    <div class="headerIcon">    
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection



