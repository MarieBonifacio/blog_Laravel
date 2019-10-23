@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <h1>Accueil</h1>
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tableau de bord</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bonjour {{ Auth::user()->name }}, vous êtes connecté(e) !
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

