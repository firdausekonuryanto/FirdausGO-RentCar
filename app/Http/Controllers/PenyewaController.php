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

class PenyewaController extends Controller
{
    public function index()
    {
        $penyewa = Penyewa::all();

        return View::make('penyewa.index')
            ->with('penyewa', $penyewa, 'title', 'Halaman Penyewa');
    }

    public function create()
    {
        return View::make('penyewa.create');
    }

    public function store(Request $request)
    {
        $validationData_Penonton = $request->validate([
            'sim'       => 'required',
            'name'      => 'required',
            'gender'    => 'required',
            'address'   => ['required', 'min:3'],
            'phone'     => 'required|numeric',
            'email'     => 'required|email',
            'username'  => 'required',
            'password'  => 'required',
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'username' => $validationData_Penonton['username'],
                'password' => $validationData_Penonton['password'],
            ]);

            $next_id = $user->id;

            $validationData_Penonton['id_user'] = $next_id;
            $validationData_Penonton['level_user'] = 0;

            Penyewa::create($validationData_Penonton);

            DB::commit();

            Session::flash('message', 'Successfully created penyewa!');
            return Redirect::to('login');
        } catch (\Exception $e) {
            DB::rollback();
            // Handle the exception, log, or return an error response.
        }
    }

    public function show($id)
    {
        $penyewa = Penyewa::find($id);

        return View::make('penyewa.show')
            ->with('penyewa', $penyewa);
    }

    public function edit($id)
    {
        $penyewa = Penyewa::find($id);

        return View::make('penyewa.edit')
            ->with('penyewa', $penyewa);
    }

    public function update(Request $request, string $id)
    {
        $validationData =  $request->validate([
            'sim'       => 'required',
            'name'       => 'required',
            'gender'       => 'required',
            'address'       => ['required', 'min:3'],
            'phone'       => 'required:numeric',
            'email'      => 'required|email'
        ]);

        Penyewa::where('id', $id)->update($validationData);

        Session::flash('message', 'Successfully updated shark!');
        return Redirect::to('penyewa');
    }

    public function destroy($id)
    {
        $penyewa = Penyewa::find($id);
        $penyewa->delete();

        Session::flash('message', 'Successfully deleted the penyewa!');
        return Redirect::to('penyewa');
    }
}
