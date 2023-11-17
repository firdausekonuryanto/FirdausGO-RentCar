<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

use App\Models\Mobil;

class TransaksiController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $penyewa = Mobil::all();

        return View::make( 'transaksi.index' )
        ->with( 'penyewa', $penyewa, 'title', 'Halaman Penyewa' );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
    }
}
