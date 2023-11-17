@extends('layouts_userlogin.main')
@section('container')

<h3 class="mt-4">{{ $title }}</h3>
<hr>
<div class="container">
    <h2>Mobil List</h2>
    <a class="btn btn-primary" href="{{ route('mobils.create') }}">Add Mobil</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Merek</th>
                <th>Model</th>
                <th>No Plat</th>
                <th>Tarif</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mobils as $mobil)
                <tr>
                    <td>{{ $mobil->id }}</td>
                    <td>{{ $mobil->merek }}</td>
                    <td>{{ $mobil->model }}</td>
                    <td>{{ $mobil->no_plat }}</td>
                    <td>{{ $mobil->tarif }}</td>
                    <td>
                        <form action="{{ route('mobils.destroy', $mobil->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('mobils.edit', $mobil->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No mobils found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection