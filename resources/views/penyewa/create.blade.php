@extends('layouts.main')
@section('container')

<h1 class="mb-4">Form Registrasi Penyewa</h1>
<form method="post" id="kirim" action="{{ url('/penyewa') }}">
    @csrf
    <div class="wizard">
        <div class="wizard-content">
            <div class="step active">
                <h2>Step 1: User Account</h2>
                <hr>
                <table class="table" style="width: 60%;">
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td>
                            @error('username')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="text" name="username" placeholder="Input your Username"
                                value="{{ old('username') }}"
                                class="form-control @error('username') is-invalid @enderror" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>
                            @error('password')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="password" name="password" placeholder="Input your password"
                                class="form-control @error('name') is-invalid @enderror" required>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="step">
                <h2>Step 2: Personal Identity</h2>
                <hr>
                <table class="table" style="width: 60%;">
                    <tr>
                        <td>No. SIM</td>
                        <td>:</td>
                        <td>
                            @error('name')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="text" name="sim" placeholder="Input your No. SIM" value="{{ old('sim') }}"
                                class="form-control @error('name') is-invalid @enderror" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Fullname</td>
                        <td>:</td>
                        <td>
                            @error('name')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="text" name="name" placeholder="Input your name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td>
                            @error('gender')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="radio" name="gender" value="Male">Male
                            <input type="radio" name="gender" value="Female">Female
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>
                            @error('address')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="text" name="address" placeholder="Input your address"
                                value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>
                            @error('phone')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <label><input type="text" name="phone" placeholder="Input your phone"
                                    value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror"
                                    required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                            @error('email')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="text" name="email" placeholder="Input your email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" required>
                        </td>
                    </tr>
                </table>
                <input type="submit" class="btn btn-success">
            </div>

    </div>
</form>

@endsection