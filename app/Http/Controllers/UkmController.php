<?php

namespace App\Http\Controllers;

use App\Models\manajemen;
use App\Models\nilai_ukm;
use Illuminate\Http\Request;
use App\Models\ukm;
use App\Models\subprogram;
use App\Models\User;
use Carbon\Carbon;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class UkmController extends Controller
{
    // SEMUA FUNCTION UNTUK PROGRAM UKM

    // view list program UKM
    // untuk admin dan 
    // puskes hanya bisa lihat list
    public function program()
    {
        $data = ukm::get(['id', 'program']);
        $route = Auth::user()->role === 'admin' ? 'Admin/Ukm/index' : 'Ukm/index';
        return Inertia::render($route, ['data' => $data]);
    }
    // view form create program
    // untuk admin
    public function create_program()
    {
        return Inertia::render();
    }
    // store data program
    // untuk admin
    public function creating_program(Request $request)
    {
        ukm::create([
            "program" => $request->program,
        ]);
        return redirect("");
    }
    // view form edit program
    // untuk admin
    public function edit_program($id)
    {
        $data = ukm::find($id);
        return Inertia::render("", compact("data"));
    }
    // update data program
    // untuk admin
    public function update_program(Request $request, $id)
    {
        $data = ukm::find($id);
        $data->update($request->all());
        return redirect("");
    }
    // hapus data program
    // untuk admin
    public function delete_program($id)
    {
        ukm::where('id', $id)->delete();
        subprogram::where('id_ukm', $id)->delete();
        return redirect()->back();
    }

    // SEMUA FUNCTION UNTUK SUBPROGRAM UKM

    // view list subprogram UKM
    // untuk admin dan 
    // puskesmas hanya bisa lihat list
    public function subprogram($id)
    {
        $name = ukm::findOrFail($id, ['id', 'program']);
        $data = subprogram::where('id_ukm', $id)->get();
        return Inertia::render("Ukm/Subprogram", ['data' => $data, 'name' => $name]);
    }
    // view form create subprogram UKM
    // untuk admin
    public function create_subprogram()
    {
        $data = ukm::all();
        return Inertia::render("", compact("data"));
    }
    // store data subprogram
    // untuk admin
    public function creating_subprogram(Request $request)
    {
        subprogram::create([
            "id_ukm" => $request->id_ukm,
            "nama" => $request->nama,
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
    // view edit_subprogram
    // untuk admin
    public function edit_subprogram($id)
    {
        $id_data = ukm::all();
        $data = subprogram::find($id);
        return Inertia::render("", compact("data", "id_data"));
    }
    // update data subprogram
    // untuk admin
    public function editing_subprogram(Request $request, $id)
    {
        $data = subprogram::find($id);
        $data->update($request->all());
        return redirect("");
    }
    // delete data subprogram
    // untuk admin
    public function delete_subprogram($id)
    {
        subprogram::where("id", $id)->delete();
        nilai_ukm::where("id_subprogram_ukm", $id)->delete();
        return redirect()->back();
    }

    // SEMUA FUNCTION UNTUK NILAI UKM
    // view list nilai nilai ukm sesuai dengan id subprogram
    // untuk puskesmas dan admin
    public function nilai_ukm($id_program, $idsub)
    {
        $user_id = auth()->user()->id;
        $role = auth()->user()->role;
        $sub = subprogram::findOrFail($idsub);
        if ($role !== "admin") {
            $data = nilai_ukm::where('id_subprogram_ukm', $idsub)
                ->where('id_users', $user_id)
                ->get();
            return Inertia::render("Ukm/Data", ['data' => $data, 'sub' => $sub]);
        }
        // else {
        //     // $id_puskes = User::pluck('id')->all();
        //     $data = nilai_ukm::where('id_nilai_ukm', $idsub)
        //         ->where('user_id', $idpuskes)
        //         ->get();
        //     return Inertia::render("", compact("data"));
        // }
    }

    public function create_nilai()
    {
        return inertia::render("");
    }
    // form create nilai UKM
    // untuk puskesmas
    public function creating_nilai(Request $request,  $id)
    {
        $data = subprogram::findOrFail($id);
        $id_user = Auth::user()->id;
        $check = nilai_ukm::where('id_users', $id_user)
            ->where('id_subprogram_ukm', $data->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::Now()->year);
        if ($check->count() > 0) {
            return back()->with('fail', 'Data Bulan ' . Carbon::now()->format('F') . ' Sudah Di Input');
        }
        //start logic hitungan.
        $hasil_kali = '';
        if ($data->type ==  1) {
            $hasil_kali = $request->pembilang * $data->kali;
        }
        $hasil_keseluruhan = $hasil_kali / $request->penyebut;
        // end login hitungan
        nilai_ukm::create([
            "id_subprogram_ukm" => $data->id,
            "id_users" => $id_user,
            "pembilang" => $request->pembilang,
            "penyebut" => $request->penyebut,
            "kali" => $data->kali,
            "hasil" => $hasil_keseluruhan,
            "target" => $request->target,
        ]);

        return back();
    }
}
