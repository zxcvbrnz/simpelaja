<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sdm;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class SdmController extends Controller
{
    public function sdm()
    {
        $id_user = auth()->user()->id;
        $data = sdm::where('id_users', $id_user)->get();
        return inertia::render("SDM/index", compact('data'));
    }
    public function create_sdm()
    {
        return inertia::render("SDM/create");
    }
    public function creating_sdm(Request $request)
    {
        $id_user = auth()->user()->id;
        sdm::create([
            'id_users' => $id_user,
            'nama_sdm' => $request->nama_sdm,
            'jumlah_sdm' => $request->jumlah_sdm,
        ]);
        return redirect()->back();
    }
    public function edit_sdm($id)
    {
        $data = sdm::findOrFail($id);
        return inertia::render("SDM/update", compact('data'));
    }
    public function editing_sdm(Request $request, $id)
    {
        $data = sdm::find($id);
        $data->update($request->all());
        return redirect()->back();
    }
    public function delete_sdm(Request $request)
    {
        $id = $request->id;
        sdm::find($id)->delete();
        return redirect()->back();
    }
}
