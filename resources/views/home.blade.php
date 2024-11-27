@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Benvenuto nel Sistema di Gestione Eventi!</h1>
    <p>Gestisci i tuoi eventi e le prenotazioni in modo semplice e veloce.</p>
    <a href="{{ route('events.index') }}" class="btn btn-primary">Visualizza Eventi</a>
</div>
@endsection
