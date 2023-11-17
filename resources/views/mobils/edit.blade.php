@extends('layouts_userlogin.main')
@section('container')

    <div class="container">
        <h2>Edit Mobil</h2>

        <form method="post" action="{{ route('mobils.update', $mobil->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="merek" class="form-label">Merek</label>
                <input type="text" class="form-control" id="merek" name="merek" value="{{ $mobil->merek }}" required>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ $mobil->model }}" required>
            </div>
           
            <div class="mb-3">
                <label for="no_plat" class="form-label">No PLat</label>
                <input type="text" class="form-control" id="no_plat" name="no_plat" value="{{ $mobil->no_plat }}" required>
            </div>

            <div class="mb-3">
                <label for="tarif" class="form-label">Tarif</label>
                <input type="text" class="form-control" id="tarif" name="tarif" value="{{ $mobil->tarif }}" required>
            </div>

            <!-- ... other fields ... -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
