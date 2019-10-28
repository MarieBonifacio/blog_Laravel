@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <h1>{{ Auth::user()->name }}</h1>
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body"> 
                    {{$user->email}}
                </div>
                <div class="card-body"> 
                    {{$user->password}}
                </div>
                {{-- @foreach($articles->user as $user)
                <div class="card-body"> 
                    
                </div>
                @endforeach --}}
            </div>
        </div> 
    </div>
</div>
@endsection
