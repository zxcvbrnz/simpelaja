<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nasionalmutu;
use App\Models\nilai_nasionalmutu;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class NasionalmutuController extends Controller
{
    public function mutu()
    {
        $data = nasionalmutu::get(["id", "mutu"]);
        $route = Auth::user()->role === 'admin' ? 'Admin/NasionalMutu/index' : 'NasionalMutu/index';
        return Inertia::render($route, ["data" => $data]);
    }
    public function create_mutu()
    {
        return Inertia::render("Admin/NasionalMutu/Create");
    }
    public function creating_mutu(Request $request)
    {
        nasionalmutu::create($request->all());
        return redirect()->back();
    }
    public function edit_mutu($id)
    {
        $data = nasionalmutu::find($id);
        return Inertia::render("", compact("data"));
    }
    public function editing_mutu(Request $request, $id)
    {
        $data = nasionalmutu::find($id);
        $data->update($request->all());
        return redirect()->back();
    }
    public function delete($id)
    {
        nasionalmutu::find($id)->delete();
        return Inertia::render("");
    }
    public function nilai_mutu($id)
    {
        $user_id = auth()->user()->id;
        $role = auth()->user()->role;
        $mutu = nasionalmutu::findOrFail($id);
        if ($role !== "admin") {
            $data = nilai_nasionalmutu::where('id_nasionalmutu', $id)
                ->where('id_users', $user_id)
                ->get();
            return Inertia::render("", ['data' => $data, 'mutu' => $mutu]);
        }
    }
    public function create_nilai()
    {
        return Inertia::render("");
    }
    public function creating_nilai_mutu(Request $request, $id)
    {
        $id_user = Auth::user()->id;
        $data = nasionalmutu::findOrFail($id);
        $nilai_4 = $data->nilai_4;
        $nilai_10 = $data->nilai_10;
        //start logic hitungan.
        $hasil_kali = '';
        if ($data->type ==  1) {
            $hasil_kali = $request->pembilang * $data->kali;
        }
        $hasil_keseluruhan = $hasil_kali / $request->penyebut;
        // end login hitungan
        // perbandingan untuk cari nilai_skala
        if ($hasil_keseluruhan < $nilai_4) {
            $nilai_skala = 4;
        } else if ($hasil_keseluruhan >= $nilai_10) {
            $nilai_skala = 10;
        } else {
            $nilai_skala = 7;
        }
        nilai_nasionalmutu::create([
            "id_nasionalmutu" => $id,
            "id_users" => $id_user,
            "penyebut" => $request->penyebut,
            "pembilang" => $request->pembilang,
            "kali" => $request->kali,
            "hasil" => $hasil_keseluruhan,
            "ket_skala" => $nilai_skala,
        ]);
        return back("");
    }
}
