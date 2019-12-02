
@extends('layouts.app')

@section('content')

<div class="title"><h1>Rédiger un article</h1></div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('storeArticle')}}">
                @csrf
                <label for="exampleInputEmail1">Titre</label>
        <div class="card-header">
            <input type="text" name="title" class="form-control" placeholder="Titre de l'article" required >
        </div>
        <div class="card-body">
                    <label for="exampleInputPassword1">Texte</label>
                    <i class="fas fa-pencil-alt prefix"></i>
                    <textarea id="ckedit" class="form-control" rows=10 type="text" name="content" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Publier</button>
            </form>
        </div>
    </div>
</div>

@endsection 