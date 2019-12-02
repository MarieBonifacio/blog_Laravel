@extends('layouts.app')

@section('content')

<div class="title"><h1>Editer un article</h1></div>

<div class="container">
    <div class="card">
                        {{-- <div class="card-body">
                    {!! Form::model($article,['method' => 'PATCH','action'=>['ArticleController@update','id'=>$article->id]]) !!}
                    {{Form::input('text', 'titre')}}
                    {{ Form::close() }}
                </div></div> --}}
        <div class="card-body">
            <form method="POST" action="{{ route('updateArticle',$article)}}">
                @method('put')
                @csrf
                <label for="exampleInputEmail1">Titre</label>
                <div class="card-header">
                    <input type="text" name="title" class="form-control" placeholder="Titre de l'article" value="{{$article->title}}" required >
                </div>
                <div class="card-body">
                    <label for="exampleInputPassword1">Texte</label>
                    <i class="fas fa-pencil-alt prefix"></i>
                    <textarea  id="ckedit" class="form-control" rows=10 type="text" name="content" class="form-control" required>{{$article->content}}</textarea>
                </div>
                {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> --}}
                
                <button type="submit" class="btn btn-primary"><i class="material-icons">done</i></button>
            </form>
        </div>
    </div>
</div>

@endsection 