@extends('layouts.main')
@section('container')
<style>
.slider {
    width: 100%;
    position: relative;
    overflow: hidden;
}

.slider-container {
    display: flex;
    transition: transform 0.5s ease;
}

.slider {
    width: 100%;
    position: relative;
    overflow: hidden;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
    /* Memberikan efek bayangan */
}

.slide img {
    width: 100%;
    border-radius: 10px;
}

.prev,
.next {
    text-decoration: none;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 30px;
    color: white;
    cursor: pointer;
    padding: 10px;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 2;
}

.prev {
    left: 0;
}

.next {
    right: 0;
}
</style>

<center>
    <br>
    <div class="slider">
        <div class="slider-container">
            <div class="slide">
                <img src="/img/ren1.png" alt="Gambar 1">
            </div>
        </div>
    </div>
    <h1 class="mt-xxl-5">Selamat Datang di <blink_me>firdausgorentcar.com</blink_me>
    </h1>
    <h4> Kami Sebagai Penyedia Penyewaan Mobil di Banyuwangi</h4>
    Dont Have an Account Register Here
    <a href="/penyewa/create">Register</a> |
    <a href="/login">Login</a>
</center>


@endsection