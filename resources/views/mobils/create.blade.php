@extends('layouts_userlogin.main')
@section('container')
    <div class="container">
        <h2>Create New Mobil</h2>

        <form method="post" action="{{ route('mobils.store') }}">
            @csrf

            <div class="mb-3">
                <label for="merek" class="form-label">Merek</label>
                <input type="text" class="form-control" id="merek" name="merek" required>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" required>
            </div>

            <div class="mb-3">
                <label for="no_plat" class="form-label">Nomor Plat</label>
                <input type="text" class="form-control" id="no_plat" name="no_plat" required>
            </div>

            <div class="mb-3">
                <label for="tarif" class="form-label">Tarif</label>
                <input type="number" class="form-control" id="tarif" name="tarif" required>
            </div>

           

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection