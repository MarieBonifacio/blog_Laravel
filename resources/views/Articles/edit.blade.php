@extends('layouts.app')

@section('content')

<div class="row justify-content-center"><h1>Editer un article</h1></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <div class="card">
                        {{-- <div class="card-body">
                    {!! Form::model($article,['method' => 'PATCH','action'=>['ArticleController@update','id'=>$article->id]]) !!}
                    {{Form::input('text', 'titre')}}
                    {{ Form::close() }}
                </div></div> --}}
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('updateArticle',$article)}}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Titre</label>
                            <input type="text" name="titre" class="form-control" placeholder="Titre de l'article" value="{{$article->titre}}" required >
                        </div>
                        <div class="form-group green-border-focus">
                            <label for="exampleInputPassword1">Texte</label>
                            <i class="fas fa-pencil-alt prefix"></i>
                            <textarea  id="ckedit" class="form-control" rows=10 type="text" name="contenu" class="form-control" required>{{$article->contenu}}</textarea>
                        </div>
                {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> --}}
                            <button type="submit" class="btn btn-primary">Publier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 