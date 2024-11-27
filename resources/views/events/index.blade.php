@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Lista degli Eventi</h1>

    <a href="{{ route('events.create') }}" class="btn btn-success mb-3">Crea Nuovo Evento</a>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Posti Disponibili</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop sugli eventi (aggiungilo una volta implementata la logica nel controller) --}}
            @foreach ($events as $event)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->available_seats }}</td>
                <td>
                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary btn-sm">Mostra</a>
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Modifica</a>
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
