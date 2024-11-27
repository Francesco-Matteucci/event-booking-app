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

    <h2 class="mt-5">Prenota il tuo posto</h2>
    <form action="{{ route('events.book', $event->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="seats" class="form-label">Numero di posti</label>
            <input type="number" class="form-control" id="seats" name="seats" min="1" max="{{ $event->available_seats }}" required>
        </div>
        <button type="submit" class="btn btn-success">Prenota</button>
    </form>

    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Torna alla lista eventi</a>
</div>
@endsection
