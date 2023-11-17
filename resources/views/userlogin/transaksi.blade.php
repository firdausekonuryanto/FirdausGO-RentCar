@extends('layouts_userlogin.main')
@section('container')
<h3 class="mt-4">{{ $title }}</h3>
<hr>

<div class="container">
<h5>List Jenis Mobil Sewa</h5>
    <table class="table table-striped" style="width: 80%;">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Merek</th>
                <th>Model</th>
                <th>Nomor Plat</th>
                <th>Tarif</th>
                <th>TGL Awal</th>
                <th>TGL Akhir</th>
                <th>Sts Sewa</th>
                <!-- <th>Aksi</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mobil as $row): ?>
            <tr>
                <td class="text-center"><?= $row['id'] ?></td>
                <td><?= $row['merek'] ?></td>
                <td><?= $row['model'] ?></td>
                <td class="text-center"><?= $row['no_plat'] ?></td>
                <td class="text-center"><?= $row['tarif'] ?></td>
                <td class="text-center"><?= $row['tgl_awal'] ?></td>
                <td class="text-center"><?= $row['tgl_akhir'] ?></td>
                <td class="text-center">
                    @if($row['sts_sewa'] == 0)
                    <button class="btn btn-primary">Open Booking</button>
                    @else
                    <button class="btn btn-secondary" disabled>Sedang Terpakai</button>
                    @endif

                </td>
             </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <hr>
    <h2>Penyewaan Mobil</h2>
    <div class="alert alert-warning" role="alert">
    <b>Validasi Ketersediaan,</b> Silahkan Pilih  Estimasi Waktu Penyewaan dan Jenis Mobil !!!
</div>
    <form method="post" action="{{ url('/transaksi') }}">
        @csrf
        <table class="table" style="width: 70%;">
            <tr>
                <td>
                    <input class="form-control" type="date" name="tgl_awal" id="">
                </td>
                <td>
                    <input class="form-control" type="date" name="tgl_akhir" id="">
                </td>
                <td>
                    <input type="submit" class="btn btn-success" value="Periksa Ketersediaan Mobil">
                </td>
            </tr>
        </table>
    </form>

    @if(isset($data))
    <h3>ID # {{Auth::user()->id}} - Pemesanan Mulai : {{$tglAwal}} s/d {{$tglAkhir}}</h3>
    Berikut ini adalah mobil yang tersedia.
    <table class="table table-striped" style="width: 70%;">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Merek</th>
                <th>Model</th>
                <th>Nomor Plat</th>
                <th>Tarif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <td class="text-center"><?= $row['id'] ?></td>
                <td><?= $row['merek'] ?></td>
                <td><?= $row['model'] ?></td>
                <td class="text-center"><?= $row['no_plat'] ?></td>
                <td class="text-center"><?= $row['tarif'] ?></td>
                <td class="text-center">

                    <form method="post" action="{{ url('/transaksi_save') }}" id="transaksi_save_form">
                        @csrf
                        <input type="hidden" name="tgl_awal" value="{{$tglAwal}}">
                        <input type="hidden" name="tgl_awal" value="{{$tglAwal}}">
                        <input type="hidden" name="tgl_akhir" value="{{$tglAkhir}}">
                        <input type="hidden" name="id_mobil" id="id_mobil_input">
                        <input type="hidden" name="tarif" id="id_tarif">
                        <button type="button" class="btn btn-warning"
        onclick="confirmSewa(<?php echo $row['id'];?>,<?php echo $row['tarif'];?>, 'transaksi_save_form')">
    Sewa Sekarang
</button>

                    </form>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        function confirmSewa(mobilId, tarif, formId) {
            var confirmation = confirm("Apakah Anda yakin ingin menyewa mobil ini?");
            if (confirmation) {
                setMobilId(mobilId, tarif, formId);
            } 
        }
        
        function setMobilId(mobilId, tarif, formId) {
            var form = document.getElementById(formId);
        if (form) {
            document.getElementById('id_mobil_input').value = mobilId;
            document.getElementById('id_tarif').value = tarif;
            form.submit();
        }
    }
    </script>
    @endif
    @if(count($transaksi) > 0)
    <hr>
    <h3>History Pemesanan Mobil</h3>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Penyewa</th>
                <th>ID Mobil</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Jumlah Hari</th>
                <th>Total Sewa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $transaction)
            <tr>
                <td>{{ $transaction->id_penyewa }}</td>
                <td>{{ $transaction->id_mobil }}</td>
                <td>{{ $transaction->tgl_awal }}</td>
                <td>{{ $transaction->tgl_akhir }}</td>
                <td>{{ $transaction->jml_hari }}</td>
                <td>{{ $transaction->total_sewa }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
            <p>Tidak ada Transaksi Pemesanan Sebelumnya.</p>
        @endif

</div>

@endsection