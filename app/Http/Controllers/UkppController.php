<?php

namespace App\Http\Controllers;

use App\Models\nilai_pelayanan;
use App\Models\pelayanan;
use App\Models\ukpp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UkppController extends Controller
{
    public function pelayanan()
    {
        $data = ukpp::get(["id", "pelayanan"]);
        return Inertia::render("", ["data" => $data]);
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
        $data = pelayanan::where("id_ukpp", $id)->get(["id", "subpelayanan"]);
        return Inertia::render("", ["data" => $data]);
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
    public function nilai_pelayanan(Request $request)
    {
        $startTime = $request->start_time ? Carbon::parse($request->start_time)->toDateTimeString() : null;
        $endTime = $request->end_time ? Carbon::parse($request->end_time)->toDateTimeString() : null;
        if ($startTime || $endTime) {
        }
    }
    public function create_nilai()
    {
    }
    public function creating_nilai(Request $request, $id)
    {
    }
}
