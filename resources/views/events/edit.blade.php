@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Modifica Evento</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome Evento</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $event->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date }}" required>
        </div>
        <div class="mb-3">
            <label for="available_seats" class="form-label">Posti Disponibili</label>
            <input type="number" class="form-control" id="available_seats" name="available_seats" value="{{ $event->available_seats }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Aggiorna Evento</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection
