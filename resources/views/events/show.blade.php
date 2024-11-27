@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ $event->name }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Descrizione</h5>
            <p class="card-text">{{ $event->description }}</p>

            <h5 class="card-title mt-4">Data</h5>
            <p class="card-text">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>

            <h5 class="card-title mt-4">Posti Disponibili</h5>
            <p class="card-text">{{ $event->available_seats }}</p>
        </div>
    </div>

    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-4">Torna alla Lista Eventi</a>
</div>
@endsection
