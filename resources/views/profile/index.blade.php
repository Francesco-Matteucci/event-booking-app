@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Profilo Utente</h1>

    <h3>Informazioni Personali</h3>
    <p><strong>Nome:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <hr>

    <h3>Cambia Password</h3>
    <form action="{{ route('profile.updatePassword') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="current_password" class="form-label">Password Corrente</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Nuova Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Conferma Nuova Password</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-success">Aggiorna Password</button>
    </form>


    <hr>

    <h3>Prenotazioni</h3>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Evento</th>
                <th>Posti Prenotati</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $booking->event->name }}</td>
                <td>{{ $booking->seats }}</td>
                <td>
                    <form action="{{ route('profile.cancelBooking', $booking->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Annulla Prenotazione</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
