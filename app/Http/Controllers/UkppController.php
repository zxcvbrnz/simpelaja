<?php

namespace App\Http\Controllers;

use App\Models\nilai_pelayanan;
use App\Models\pelayanan;
use App\Models\ukpp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class UkppController extends Controller
{
    public function pelayanan()
    {
        $data = ukpp::get(["id", "pelayanan"]);
        $route = Auth::user()->role === 'admin' ? 'Admin/Ukpp/index' : 'Ukpp/index';
        return Inertia::render($route, ["data" => $data]);
    }
    public function create_pelayanan()
    {
        return Inertia::render("");
    }
    public function creating_pelayanan(Request $request)
    {
        ukpp::create([
            "pelayanan" => $request->pelayanan,
        ]);
        return redirect("");
    }
    public function edit_pelayanan($id)
    {
        $data = ukpp::find($id);
        return Inertia::render("", compact("data"));
    }
    public function update_pelayanan(Request $request, $id)
    {
        $data = ukpp::find($id);
        $data->update($request->all());
        return redirect("");
    }
    public function delete_pelayanan($id)
    {
        ukpp::where('id', $id)->delete();
        pelayanan::where('id_ukpp', $id)->delete();
        return redirect()->back();
    }

    // ======== SEMUA FUNCTION SUBPELAYANAN ==========
    public function subpelayanan($id)
    {
        $name = ukpp::findOrFail($id, ['id', 'pelayanan']);
        $data = pelayanan::where("id_ukpp", $id)->get(["id", "subpelayanan"]);
        return Inertia::render("Ukpp/SubPelayanan", ["data" => $data, 'name' => $name]);
    }
    public function create_subpelayanan()
    {
        $data = ukpp::all();
        return Inertia("", compact("data"));
    }
    public function creating_subpelayanan(Request $request)
    {
        pelayanan::create([
            "id_ukpp" => $request->id_ukpp,
            "subpelayanan" => $request->subpelayanan,
            "str_penyebut" => $request->str_penyebut,
            "str_pembilang" => $request->str_pembilang,
            "kali" => $request->kali,
            "target" => $request->target,
            "str_target" => $request->str_target,
            "satuan" => $request->satuan,
            "type" => $request->type,
        ]);
        return redirect("");
    }
    public function edit_subpelayanan($id)
    {
        $id_data = ukpp::all();
        $data = pelayanan::find($id);
        return Inertia("", compact("id_data", "data"));
    }
    public function update_subpelayanan(Request $request, $id)
    {
        $data = pelayanan::find($id);
        $data->update($request->all());
        return redirect("");
    }
    public function delete_subpelayanan($id)
    {
        pelayanan::where("id", $id)->delete();
        nilai_pelayanan::where("id_subpelayanan_ukpp", $id)->delete();
        return redirect()->back();
    }
    // ========== SEMUA FUNCTION NILAI_PELAYANAN_UKPP ==========
    public function nilai_pelayanan(Request $request, $id_pelayanan, $idsub)
    {
        $user_id = auth()->user()->id;
        $role = auth()->user()->role;
        $sub = pelayanan::findOrFail($idsub);
        if ($role !== "admin") {
            $data = nilai_pelayanan::where('id_subpelayanan_ukpp', $idsub)
                ->where('id_users', $user_id)
                ->get();
            return Inertia::render("Ukpp/Data", ['data' => $data, 'sub' => $sub]);
        }
    }
    public function create_nilai()
    {
    }
    public function creating_nilai(Request $request, $id)
    {
    }
}
