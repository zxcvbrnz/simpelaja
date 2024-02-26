<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manajemen;
use App\Models\nilai_manajemen;
use App\Models\submanajemen;
use Carbon\Carbon;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;



class ManajemenController extends Controller
{
    public function manajemen()
    {
        $data = manajemen::get(["id", "manajemen"]);
        $route = Auth::user()->role === 'admin' ? 'Admin/Manajemen/index' : 'Manajemen/index';
        return Inertia::render($route, ["data" => $data]);
    }
    public function create_manajemen()
    {
        return Inertia::render("Admin/Manajemen/Create");
    }
    public function creating_manajemen(Request $request)
    {
        manajemen::create([
            "manajemen" => $request->manajemen,
        ]);
        return back();
    }
    public function edit_manajemen($id)
    {
        $data = manajemen::find($id);
        return Inertia::render("Admin/Manajemen/Edit", ['data' => $data]);
    }
    public function update_manajemen(Request $request, $id)
    {
        $data = manajemen::find($id);
        $data->update($request->all());
        return back();
    }
    public function delete_manajemen(Request $request)
    {
        $id = $request->id;
        manajemen::find($id)->delete();
        submanajemen::where("id_manajemen", $id)->delete();
        return back();
    }

    // ========== SUB MANAJEMEN =============
    public function submanajemen(Request $request, $id)
    {
        // Program
        $name = manajemen::findOrFail($id, ['id', 'manajemen']);
        $data = submanajemen::where('id_manajemen', $id)->get();

        // Mencari data capaian berdasarka User
        $id_user = $request->user()->id;
        $data_skala = nilai_manajemen::where('id_users', $id_user);

        // data capaian yang dibuat oleh user terkait dengan id_ukm
        $now = Carbon::now();
        $skala = $data_skala
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year);

        $skala = $skala->get(['id_submanajemen', 'hasil', 'ket_skala']);

        return Inertia::render("Manajemen/Sub/index", ['data' => $data, 'name' => $name, 'skala' => $skala]);
        // $data = submanajemen::where("id_manajemen", $id);
        // return Inertia::render("Manajemen/Sub/index", ['data' => $data]);
    }
    public function create_submanajemen($id)
    {
        $data = manajemen::findOrFail($id, ['id', 'manajemen']);
        return Inertia::render("Admin/Manajemen/Sub/Create", ['data' => $data]);
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
        return back();
    }
    public function edit_submanajemen($id, $idsub)
    {
        $data = manajemen::findOrFail($id, ['id', 'manajemen']);
        $datasub = submanajemen::findOrFail($idsub);
        return Inertia::render("Admin/Manajemen/Sub/Edit", ['data' => $data, 'datasub' => $datasub]);
    }
    public function update_submanajemen(Request $request)
    {
        $id = $request->id;
        $data = submanajemen::findOrFail($id);
        $data->update($request->all());
        return back();
    }
    public function delete_submanajemen(Request $request)
    {
        $id = $request->id;
        submanajemen::findOrFail($id)->delete();
        return back();
    }
    // ====== NILAI MANAJEMEN =======
    public function nilai_manajemen(Request $request, $id_manajemen, $idsub)
    {
        $user_id = auth()->user()->id;
        $sub = submanajemen::findOrFail($idsub);
        $manajemen = manajemen::findOrFail($id_manajemen, ['id', 'manajemen']);

        $data = nilai_manajemen::where('id_submanajemen', $idsub)
            ->where('id_users', $user_id)->get();
        return Inertia::render("Manajemen/Data", ['manajemen' => $manajemen, 'data' => $data, 'sub' => $sub]);
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

        $check = nilai_manajemen::where('id_users', $id_user)
            ->where('id_submanajemen', $data->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::Now()->year);
        if ($check->count() > 0) {
            return back()->with('error', 'Data Bulan ' . Carbon::now()->format('F') . ' Sudah Di Input');
        }
        //start logic hitungan.
        $ket_skala = '';
        if ($request->skala ==  4) {
            $ket_skala = $data->ket_nilai_4;
        } else if ($request->skala ==  7) {
            $ket_skala = $data->ket_nilai_7;
        } else if ($request->skala ==  10) {
            $ket_skala = $data->ket_nilai_10;
        } else if ($request->skala ==  0) {
            $ket_skala = $data->ket_nilai_0;
        }
        // end login hitungan
        nilai_manajemen::create([
            "id_submanajemen" => $id,
            "id_users" => $id_user,
            "hasil" => $request->skala,
            "ket_skala" => $ket_skala,
        ]);
        return back();
    }
}
