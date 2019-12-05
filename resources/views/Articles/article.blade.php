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

<div class="container com">
    @if(Auth::user())
        <textarea id="comment"></textarea>
        <input type="hidden" id="csrf" value='{{ csrf_token() }}' required>
        <button id="cButton">Publier</button>
    @endif
    <div id="comments">
        @foreach($article->comments->sortByDesc('created_at') as $comment)
    <div class="comment" rel="{{$comment->id}}">
                <div class="menuCom">
                    <div class="name">{{$comment->user->name}}</div>
                    @if($comment->author_id == Auth::user()->id)
                    <button class="buttonCom"><i class="material-icons">more_horiz</i></button>
                    @endif
                </div>
                <div class="navCom">
                    <button class="boutonComClose"><i class="material-icons">close</i></button>
                    <ul>
                        <a class="editComment" href=""><li>modifier</li></a>
                        <a class="deleteComment" href=""><li>supprimer</li></a>
                    </ul>
                </div>
                <div class="content">{{!!nl2br(e($comment->content))!!}}</div>
                <div class="">{{$comment->created_at}}</div>
            </div>
        @endforeach
    </div>
</div>

@endsection

@section("javascript")
    @if(Auth::user())
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
                    comment = response.data.success;
                    bloc = document.createElement('div');
                    bloc.classList.add('comment');
                    bloc.innerHTML = " \
                        <div class='menuCom'> \
                            <div class='name'>{{Auth::user()->name}}</div> \
                            <button class='buttonCom'><i class='material-icons'>more_horiz</i></button> \
                        </div> \
                        <div class='content' style='white-space: pre-wrap;'> \
                            "+comment.content+" \
                        </div> \
                        <div class=''>"+comment.created_at+"</div> \
                        <div class='navCom'> \
                            <button class='boutonComClose'><i class='material-icons'>close</i></button> \
                            <ul> \
                                <a class='editComment' href=''><li>modifier</li></a> \
                                <a class='deleteComment' href=''><li>supprimer</li></a> \
                            </ul> \
                        </div> \
                        ";
                        document.querySelector("#comments").prepend(bloc);
                });
            });


            //EDIT
            let editLinks = document.querySelectorAll('.editComment');

            editLinks.forEach (function(editLink){
                editLink.addEventListener('click', function(e){
                    e.preventDefault();
                    editLink.parentNode.parentNode.classList.remove('open');
                    let div = document.createElement("div");
                    let textarea = document.createElement("textarea");
                    let btnSave = document.createElement("button");
                    let btnCancel = document.createElement("button");
                    div.classList.add('editCommentDiv');
                    btnSave.innerHTML="Enregistrer";
                    btnCancel.innerHTML="Annuler";
                    textarea.value= editLink.parentNode.parentNode.parentNode.querySelector(".content").innerHTML;
                    div.appendChild(textarea);
                    div.appendChild(btnSave);
                    div.appendChild(btnCancel);
                    editLink.parentNode.parentNode.parentNode.appendChild(div);
                    btnCancel.addEventListener('click', function(){
                        div.remove();
                    });
                    btnSave.addEventListener('click', function(){
                        let newCom = textarea.value;
                        let idCom = div.parentNode.getAttribute("rel");
                        axios({
                            headers: {
                                "Content-Type": "application/json",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-Token": document.head.querySelector("[name=csrf-token][content]").content
                            },
                            method:'post',
                            url:"{{route('updateComment')}}",
                            data: {newCom:newCom, user:{{Auth::user()->id}},comment:idCom},
                        }).then(response => {
                            if(response.data.success){
                                div.remove();
                                editLink.parentNode.parentNode.parentNode.querySelector(".content").innerHTML=newCom;
                            }
                        });
                    });
                });
            });

            //DELETE
            let deleteLinks = document.querySelectorAll('.deleteComment');

            deleteLinks.forEach (function(deleteLink){
                deleteLink.addEventListener('click', function(e){
                    e.preventDefault();
                    deleteLink.parentNode.parentNode.classList.remove('open');
                    let idCom = deleteLink.parentNode.parentNode.parentNode.getAttribute("rel");
                    axios({
                        headers: {
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-Token": document.head.querySelector("[name=csrf-token][content]").content
                        },
                        method:'post',
                        url:"/comment/delete/"+idCom,
                        data: {user:{{Auth::user()->id}},comment:idCom}
                    }).then(response => {
                        if(response.data.success){
                            deleteLink.parentNode.parentNode.parentNode.remove();
                        }
                    });
                });
            });


        </script>
    @endif
@endsection