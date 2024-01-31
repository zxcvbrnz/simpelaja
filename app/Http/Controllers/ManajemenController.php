<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manajemen;
use App\Models\nilai_manajemen;
use App\Models\submanajemen;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;



class ManajemenController extends Controller
{
    public function manajemen()
    {
        $data = manajemen::all();
        return Inertia::render("", compact("data"));
    }
    public function create_manajemen()
    {
        return Inertia::render("");
    }
    public function creating_manajemen(Request $request)
    {
        manajemen::create([
            "manajemen" => $request->manajemen,
        ]);
        return redirect()->back();
    }
    public function edit_manajemen($id)
    {
        $data = manajemen::find($id);
        return Inertia::render("", compact("data"));
    }
    public function editing_manajemen(Request $request, $id)
    {
        $data = manajemen::find($id);
        $data->update($request->all());
        return redirect()->back();
    }
    public function delete_manajemen($id)
    {
        manajemen::find($id)->delete();
        submanajemen::where("id_manajemen", $id)->delete();
        return Inertia::render("");
    }

    // ========== SUB MANAJEMEN =============
    public function submanajemen($id)
    {
        $data = submanajemen::where("id_submanajemen", $id);
        return Inertia::render("", compact("data"));
    }
    public function create_submanajemen()
    {
        $data = manajemen::all();
        return Inertia::render("", compact("data"));
    }
    public function creating_submanajemen(Request $request)
    {
        submanajemen::create([
            "id_manajemen" => $request->id_manajemen,
            "nama_submanajemen" => $request->nama_submanajemen,
            "ket_nilai_0" => $request->ket_nilai_0,
            "ket_nilai_4" => $request->ket_nilai_4,
            "ket_nilai_7" => $request->ket_nilai_7,
            "ket_nilai_10" => $request->ket_nilai_10,
        ]);
        return redirect("");
    }
    public function edit_submanajemen($id)
    {
        $id_data = manajemen::all();
        $data = submanajemen::find($id);
        return Inertia::render("", compact("data", "id_data"));
    }
    public function editing_submanajemen(Request $request, $id)
    {
        $data = submanajemen::find($id);
        $data->update($request->all());
        return redirect("");
    }
    public function delete_submanajemen($id)
    {
        submanajemen::find($id)->delete();
        nilai_manajemen::where("id_submanajemen", $id)->delete();
        return Inertia::render("");
    }
    // ====== NILAI MANAJEMEN =======
    public function nilai_manajemen($id, $idpuskes)
    {
        $user_id = auth()->user()->id;
        $role = auth()->user()->role;
        if ($role !== "admin") {
            $data = nilai_manajemen::where('id_submanajemen', $id)
                ->where('user_id', $user_id)
                ->get();
            return Inertia::render("", compact("data"));
        } else {
            // $id_puskes = User::pluck('id')->all();
            $data = nilai_manajemen::where('id_submanajemen', $id)
                ->where('user_id', $idpuskes)
                ->get();
            return Inertia::render("", compact("data"));
        }
    }
    public function create_nilai()
    {
        $data = submanajemen::all();
        return inertia::render("", compact("data"));
    }
    public function creating_nilai(Request $request, $id)
    {
        $data = submanajemen::findOrFail($id);
        $id_user = Auth::user()->id;
        //start logic hitungan.
        if ($request->ket_skala ==  4) {
            $hasil = 4;
            $ket_skala = submanajemen::where('id', $id)->value('ket_skala_4');
        } else if ($request->ket_skala ==  7) {
            $hasil = 7;
            $ket_skala = submanajemen::where('id', $id)->value('ket_skala_7');
        } else if ($request->ket_skala ==  10) {
            $hasil = 10;
            $ket_skala = submanajemen::where('id', $id)->value('ket_skala_10');
        } else if ($request->ket_skala ==  0) {
            $hasil = 0;
            $ket_skala = submanajemen::where('id', $id)->value('ket_skala_0');
        }
        // end login hitungan
        nilai_manajemen::create([
            "id_submanajemen" => $id,
            "id_users" => $id_user,
            "hasil" => $hasil,
            "ket_skala" => $ket_skala,
        ]);
        return redirect("");
    }
}
