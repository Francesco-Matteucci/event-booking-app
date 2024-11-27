@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row text-center">
        <div class="col">
            <h1 class="display-4">Benvenuto nel Sistema di Gestione Eventi!</h1>
            <p class="lead">Gestisci i tuoi eventi e le prenotazioni in modo semplice e veloce.</p>
            <a href="{{ route('events.index') }}" class="btn btn-primary btn-lg mt-3">Vai alla Gestione Eventi</a>
        </div>
    </div>
</div>
@endsection
