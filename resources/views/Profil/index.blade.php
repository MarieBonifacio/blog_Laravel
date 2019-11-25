@extends('layouts.app')

@section('content')

<h1>{{ $user->name }}</h1>
<div class="container profil">
    <div class="card">
        <div class="card-header">
            <h2>Informations</h2>
        </div>
            <div class="card-body">

                <p>Adresse Email : {{$user->email}}</p>

                <p>Mot de passe : {{$user->password}}</p>

            </div>
    </div>
                {{-- cf fonction articles dans modele user --}}
    <div class="card articles">
        <div class="card-header">
            <h2>Articles</h2>
        </div>

        @foreach($user->articles as $article)
        <div class="card-body articlesList"> 
                <div class="list">
                        <a href ="{{route('article', $article->id)}}"><h3>{{$article->titre}}</h3></a>
                                {{--DELETE--}}
                                <div class="actions">
                                    @if($article->author_id == Auth::user()->id)
                                        <form action="{{route('deleteArticle', $article->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn"><ion-icon name="trash" class="trash"></ion-icon></button>
                                    </form> 
                                    @endif
                                    
                                    {{-- <a href="{{route('deleteArticle', $article->id)}}"><ion-icon name="trash"></ion-icon></a> --}}
                                    {{--UPDATE--}}
                                    @if($article->author_id == Auth::user()->id)
                                    <form action="{{route('editArticle', $article->id)}}" method="get">
                                        @csrf
                                    <button type="submit" class="btn"><ion-icon name="create"></ion-icon></button>
                                    </form>
                                    @endif
                                    {{--VIEW--}}
                                    <form action="{{route('article', $article->id)}}" method="get">
                                        @method('get')
                                        @csrf                             
                                        <button type="submit" class="btn"><ion-icon name="eye"></ion-icon></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if($user->id == Auth::user()->id)
                    <a href="{{ route('createArticle')}}" type="button" class="btn-lg btn-primary"><ion-icon name="add"></ion-icon></a>
                    @endif
</div>
@endsection
