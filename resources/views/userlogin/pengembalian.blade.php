@extends('layouts_userlogin.main')
@section('container')
<h3 class="mt-4">{{ $title }}</h3>
<hr>
<h5>Ketersediaan Mobil</h5>
<table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Merek</th>
                <th>Model</th>
                <th>No Plat</th>
                <th>Tarif</th>
                <th>TGL Awal</th>
                <th>TGL Akhir</th>
                <th>TGL Sts Sewa</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mobilx as $mobil)
                <tr>
                    <td>{{ $mobil->id }}</td>
                    <td>{{ $mobil->merek }}</td>
                    <td>{{ $mobil->model }}</td>
                    <td>{{ $mobil->no_plat }}</td>
                    <td>{{ $mobil->tarif }}</td>
                    <td>{{ $mobil->tgl_awal }}</td>
                    <td>{{ $mobil->tgl_akhir }}</td>
                    <td>
                    @if($mobil->sts_sewa == 0)
                    
<button class="btn btn-primary">Tersedia</button>
@else 
<button class="btn btn-secondary" disabled>Terpakai</button>                   
                    @endif 
                   </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No mobils found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
<hr>
<h5>Transaksi Pengembalian Mobil</h5>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<div class="container">
    @if(count($transaksi) > 0)
    <form method="post" action="">
    @csrf

    <div class="row">
        <div class="col-md-6 mb-3">
            <input type="text" name="no_plat" id="no_plat" class="form-control" placeholder="Enter No. Plat">
        </div>

        <div class="col-md-6 mb-3">
            <input type="submit" value="Check" class="btn btn-success">
        </div>
    </div>
</form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Penyewa</th>
                <th>Username</th>
                <th>ID Mobil</th>
                <th>Merek</th>
                <th>No Plat</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Jumlah Hari</th>
                <th>Total Sewa</th>
                <th>Masa Penyewaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $transaction)

         <tr>
                <td>{{ $transaction->id_penyewa }}</td>
                <td>{{ optional($transaction->penyewa)->username }}</td>
                <td>{{ $transaction->id_mobil }}</td>
                <td>{{ optional($transaction->mobil)->merek }}</td>
                <td>{{ optional($transaction->mobil)->no_plat }}</td>
                <td>{{ $transaction->tgl_awal }}</td>
                <td>{{ $transaction->tgl_akhir }}</td>
                <td>{{ $transaction->jml_hari }}</td>
                <td>{{ $transaction->total_sewa }}</td>
                <td>
                <form method="post" action="{{ url('/pengembalian_update') }}" id="transaksi_kembali">
                        @csrf
                <?php
                if(strtotime($transaction->tgl_akhir) > strtotime(now())){
                    echo "<span class='btn btn-warning'>On Progress</span> ";
                    ?>
                        <input type="hidden" name="id_mobil" id="id_mobil_input">

                   <span onclick="confirmSewa(<?php echo $transaction->id_mobil;?>, 'transaksi_kembali')" class='btn btn-primary'>Return</span>
                <?php } else {
                    echo "<span  class='btn btn-danger'>Terlewat | Expired</span> ";
                }
                ?>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function confirmSewa(mobilId,  formId) {
            var confirmation = confirm("Apakah Anda yakin ingin Mengembalikan mobil ini?");
            if (confirmation) {
                setMobilId(mobilId, formId);
            } 
        }
        
        function setMobilId(mobilId,  formId) {
            var form = document.getElementById(formId);
            if (form) {
                document.getElementById('id_mobil_input').value = mobilId;
            form.submit();
        }
    }
    </script>
    @else
            <p>Tidak ada Transaksi Pemesanan Sebelumnya.</p>
        @endif

</div>

@endsection
