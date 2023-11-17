<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Penyewa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserloginController extends Controller
 {
    public function home()
 {
        return view( 'userlogin.home', [
            'title' => 'Halaman Home'
        ] );
    }

    public function dashboard()
 {
        $penyewa = Penyewa::where( 'id_user', '=', Auth::user()->id )->first();

        return view( 'userlogin.dashboard', [
            'title' => 'Halaman Dasboard',
            'penyewa' => $penyewa
        ] );
    }

    public function transaksi()
 {
        $mobil = Mobil::all();
        $transaksi = Transaksi::where( 'id_penyewa', Auth::user()->id )->get();
        return view( 'userlogin.transaksi', [
            'title' => 'Halaman Pemesanan Mobil',
            'mobil' =>$mobil,
            'transaksi' =>$transaksi
        ] );
    }

    public function transaksi_sewa( Request $request )
 {
        $mobil = Mobil::all();
        $transaksi = Transaksi::where( 'id_penyewa', Auth::user()->id )->get();
        $tglAwal = $request->input( 'tgl_awal' );
        $tglAkhir = $request->input( 'tgl_akhir' );
        $mobil = $request->input( 'mobil' );

        // $data = Mobil::whereNull( 'tgl_awal' )
        // ->whereNull( 'tgl_akhir' )
        // ->get();

        $data = Mobil::where(function ($query) use ($tglAwal, $tglAkhir) {
            $query->whereNull('tgl_awal')
                ->orWhereNull('tgl_akhir')
                ->orWhere(function ($innerQuery) use ($tglAwal, $tglAkhir) {
                    $innerQuery->where('tgl_awal', '>', $tglAkhir)
                        ->orWhere('tgl_akhir', '<', $tglAwal);
                });
        })->get();

        $mobil = Mobil::all();
        return view( 'userlogin.transaksi', [
            'title' => 'Halaman Pemesanan Mobil',
            'mobil' =>$mobil,
            'data'=>$data,
            'tglAwal'=>$tglAwal,
            'tglAkhir'=>$tglAkhir,
            'transaksi' =>$transaksi

        ] );
    }

    private function calculateJumlahHari( $tglAwal, $tglAkhir )
 {
        $tanggalAwal = new \DateTime( $tglAwal );
        $tanggalAkhir = new \DateTime( $tglAkhir );

        $interval = $tanggalAwal->diff( $tanggalAkhir );

        return $interval->days;
    }

    public function transaksi_save( Request $request ) {
        Transaksi::create( [
            'id_penyewa' => Auth::user()->id,
            'id_mobil' => $request->input( 'id_mobil' ),
            'tgl_awal' => $request->input( 'tgl_awal' ),
            'tgl_akhir' => $request->input( 'tgl_akhir' ),
            'jml_hari' => $this->calculateJumlahHari( $request->input( 'tgl_awal' ), $request->input( 'tgl_akhir' ) ),
            'total_sewa' => $this->calculateJumlahHari( $request->input( 'tgl_awal' ), $request->input( 'tgl_akhir' ) ) *  $request->input( 'tarif' ),
        ] );

        $mobilId = $request->input( 'id_mobil' );
        $mobil = Mobil::find( $mobilId );
        if ( $mobil ) {
            $mobil->update([
                'sts_sewa' => 1,
                'tgl_awal' => $request->input('tgl_awal'),
                'tgl_akhir' => $request->input('tgl_akhir'),
            ]);
        }

        return redirect( '/transaksi' )->with( 'success', 'Transaksi berhasil disimpan!' );
    }

    public function login()
 {
        return view( 'login' );
    }

    public function authenticate( Request $request ): RedirectResponse
 {
        $credentials = $request->validate( [
            'username' => [ 'required' ],
            'password' => [ 'required' ],
        ] );

        if ( Auth::attempt( $credentials ) ) {
            $request->session()->regenerate();
            return redirect( '/dashboard' );
        }

        return back()->with( 'statusError', 'Account in corect !!!' );
    }

    public function logout( Request $request )
 {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect( '/' );
    }
}
