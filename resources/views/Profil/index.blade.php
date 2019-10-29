@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <h1>{{ Auth::user()->name }}</h1>
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2>Informations</h2>
                <div class="card-body"> 
                    {{$user->email}}
                </div>
                <div class="card-body"> 
                    {{$user->password}}
                </div>
                <div class="card-body"> 
                <a href="{{ route('createArticle')}}" type="button" class="btn-lg btn-primary">Nouvel article</a>
                </div>
                {{-- cf fonction articles dans modele user --}}
                @foreach($user->articles as $article)
                    <div class="card">
                        <div class="card-body"> 
                            <a href ="{{route('article', $article->id)}}">{{$article->titre}}</a>
                            <div class="row justify-content-center">
                                <form action="{{route('deleteArticle', $article->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn"><ion-icon name="trash" class="trash"></ion-icon></button>
                                </form> 
                                {{-- <a href="{{route('deleteArticle', $article->id)}}"><ion-icon name="trash"></ion-icon></a> --}}
                                <form>
                                <form action="{{route('deleteArticle', $article->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')                               
                                <button type="subit" class="btn"><ion-icon name="create"></ion-icon></button>
                                </form>
                                <form action="{{route('deleteArticle', $article->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')                               
                                    <button type="subit" class="btn"><ion-icon name="eye"></ion-icon></button>
                                    </form>
                            </div>
                        </div> 
                    </div>
                @endforeach
            </div>
        </div> 
    </div>
</div>
@endsection
