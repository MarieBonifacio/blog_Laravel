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
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
