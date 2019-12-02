@extends('layouts.app')

@section('content')

<div class="container read">
    <div class="card read">
        <div class="card-header">
            <h1>{{$article->title}}</h1>
        </div>

        <div class="card-body">
            ({!! nl2br(e($article->content)) !!})<br/>
        </div>
        <div class="card-body"> 
            <a href={{route('profil', $article->user->id)}}>{{$article->user->name}}</a><br/>
            <p>&nbsp; Le &nbsp;{{$article->created_at}}</p>
        </div>
    </div>
</div>

<div class="container">
    <textarea id="comment"></textarea>
    <input type="hidden" id="csrf" value='{{ csrf_token() }}'>
    <button id="cButton">Publier</button>
    <div id="comments">
        @foreach($article->comments as $comment)
            <div>{{$comment}}</div>
        @endforeach
    </div>
</div>

@endsection

@section("javascript")
    <script type="text/javascript">
       
       
        $("#cButton").click(function(e){  
            var comment = $("#comment").val();
            axios({
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": document.head.querySelector("[name=csrf-token][content]").content
                },
                method:'post',
                url:"{{route('storeComment')}}",
                data: {comment:comment, user:{{Auth::user()->id}},article:{{$article->id}}},
            }).then(response => {
                comment = response.data.success.content;
                bloc = document.createElement('div');
                bloc.innerHTML = comment;
                document.querySelector("#comments").prepend(bloc);
            });
      
        });
    </script>
@endsection