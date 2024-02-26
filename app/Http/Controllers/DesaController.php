<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\desa;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class DesaController extends Controller
{
    public function desa()
    {
        $id_user = auth()->user()->id;
        $data = desa::where('id_users', $id_user)->get();
        return inertia::render("Desa/index", compact('data'));
    }
    public function create_desa()
    {
        return inertia::render("Desa/create");
    }
    public function creating_desa(Request $request)
    {
        $id_user = auth()->user()->id;
        desa::create([
            'id_users' => $id_user,
            'nama_desa' => $request->nama_desa,
            'jumlah_penduduk' => $request->jumlah_penduduk,
        ]);
        return redirect()->back();
    }
    public function edit_desa($id)
    {
        $data = desa::findOrFail($id);
        return inertia::render("Desa/update", compact('data'));
    }
    public function editing_desa(Request $request, $id)
    {
        $data = desa::find($id);
        $data->update($request->all());
        return redirect()->back();
    }
    public function delete_desa(Request $request)
    {
        $id = $request->id;
        desa::find($id)->delete();
        return redirect()->back();
    }
}
