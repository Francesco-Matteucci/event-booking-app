@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Crea un Nuovo Evento</h1>

    <form action="{{ route('events.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome Evento</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome dell'evento" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Inserisci una descrizione" required></textarea>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="available_seats" class="form-label">Posti Disponibili</label>
            <input type="number" class="form-control" id="available_seats" name="available_seats" placeholder="Inserisci il numero di posti disponibili" required>
        </div>
        <button type="submit" class="btn btn-success">Crea Evento</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection
