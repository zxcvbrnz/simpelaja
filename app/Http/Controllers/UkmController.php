<?php

namespace App\Http\Controllers;

use App\Models\nilai_ukm;
use Illuminate\Http\Request;
use App\Models\ukm;
use App\Models\subprogram;
use App\Models\User;
use Carbon\Carbon;
use Inertia\Inertia;
use App\Exports\ukmExport;
use Maatwebsite\Excel\Facades\Excel;
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
        return Inertia::render('Admin/Ukm/Add');
    }
    // store data program
    // untuk admin
    public function creating_program(Request $request)
    {
        ukm::create([
            "program" => $request->program,
        ]);
        return back();
    }
    // view form edit program
    // untuk admin
    public function edit_program($id)
    {
        $data = ukm::findOrFail($id);
        return Inertia::render('Admin/Ukm/Edit', ['data' => $data]);
    }
    // update data program
    // untuk admin
    public function update_program(Request $request, $id)
    {
        $data = ukm::find($id);
        $data->update($request->all());
        return back();
    }
    // hapus data program
    // untuk admin
    public function delete_program(Request $request)
    {
        $id = $request->id;
        ukm::findOrFail($id)->delete();
        subprogram::where('id_ukm', $id)->delete();
        return back();
    }

    // SEMUA FUNCTION UNTUK SUBPROGRAM UKM

    // view list subprogram UKM
    // untuk admin dan
    // puskesmas hanya bisa lihat list
    public function subprogram(Request $request, $id)
    {
        // apakah ada request filter
        $startTime = $request->start_time ? Carbon::parse($request->start_time)->toDateTimeString() : null;
        $endTime = $request->end_time ? Carbon::parse($request->end_time)->toDateTimeString() : null;

        // Program
        $name = ukm::findOrFail($id, ['id', 'program']);
        $data = subprogram::where('id_ukm', $id)->get();

        // Mencari data capaian berdasarka User
        $id_user = $request->user()->id;
        $data_capaian = nilai_ukm::where('id_users', $id_user);

        // data capaian yang dibuat oleh user terkait dengan id_ukm
        $now = Carbon::now();

        $data_nilai = [];

        if ($startTime && $endTime) {
            $data_nilai = $data_capaian->whereBetween('data_untuk', [$startTime, $endTime])->get();
        } else {
            $data_nilai = $data_capaian
                ->whereMonth('data_untuk', $now->month)
                ->whereYear('data_untuk', $now->year)
                ->get();
        }

        $grapik = [];

        // Calculate average hasil for each subprogram
        foreach ($data as $d) {
            $datanilai = $data_nilai->where('id_subprogram_ukm', $d->id);
            $total = $datanilai->sum('hasil');
            if ($datanilai->count() > 0) {
                $average = $total / $datanilai->count();
                $grapik[$d->id] = $average; // Store average value for each subprogram
            } else {
                $grapik[$d->id] = 0; // If no data found, set average to 0
            }
        }
        $capaian = $data_capaian
            ->whereMonth('data_untuk', $now->month)
            ->whereYear('data_untuk', $now->year)->get();

        // return dd($grapik);
        return Inertia::render("Ukm/Subprogram", ['data' => $data, 'name' => $name, 'capaian' => $capaian, 'grapik' => $grapik]);
    }
    // view form create subprogram UKM
    // untuk admin
    public function create_subprogram($id)
    {
        $data = ukm::findOrFail($id, ['id', 'program']);
        return Inertia::render('Admin/Ukm/Subprogram/Add', ['data' => $data]);
    }
    // store data subprogram
    // untuk admin
    public function creating_subprogram(Request $request)
    {
        $data = subprogram::create([
            "id_ukm" => $request->id_ukm,
            "nama" => $request->nama,
            "str_pembilang" => $request->str_pembilang,
            "str_penyebut" => $request->str_penyebut ?  $request->str_penyebut : null,
            "kali" => $request->kali ?  $request->kali : null,
            "target" => $request->target,
            "str_target" => $request->str_target,
            "satuan" => $request->satuan,
            "type" => $request->type,
        ]);
        return back();
    }
    // view edit_subprogram
    // untuk admin
    public function edit_subprogram($idukm, $idsub)
    {
        $data = ukm::findOrFail($idukm);
        $datasub = subprogram::find($idsub);
        return Inertia::render("Admin/Ukm/Subprogram/Edit", ['data' => $data, 'datasub' => $datasub]);
    }
    // update data subprogram
    // untuk admin
    public function update_subprogram(Request $request)
    {
        $id = $request->id;
        $data = subprogram::find($id);
        $data->update($request->all());
        return back();
    }
    // delete data subprogram
    // untuk admin
    public function delete_subprogram(Request $request)
    {
        $id = $request->id;
        subprogram::where("id", $id)->delete();
        return redirect()->back();
    }

    // SEMUA FUNCTION UNTUK NILAI UKM
    // view list nilai nilai ukm sesuai dengan id subprogram
    // untuk puskesmas dan admin
    public function nilai_ukm($id_program, $idsub)
    {
        $user_id = auth()->user()->id;
        $sub = subprogram::findOrFail($idsub);
        $program = ukm::findOrFail($id_program, ['id', 'program']);

        $data = nilai_ukm::where('id_subprogram_ukm', $idsub)
            ->where('id_users', $user_id)->get();
        return Inertia::render("Ukm/Data", ['program' => $program, 'data' => $data, 'sub' => $sub]);
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

        $delay = Carbon::now()->subDay(env('DELAY_INPUT_DATA'));
        $check = nilai_ukm::where('id_users', $id_user)
            ->where('id_subprogram_ukm', $data->id)
            ->whereMonth('created_at', $delay->month)
            ->whereYear('created_at', $delay->year);
        if ($check->count() > 0) {
            return back()->with('fail', 'Data Bulan ' . Carbon::now()->format('F') . ' Sudah Di Input');
        }
        //start logic hitungan.
        $hasil_keseluruhan = '';
        if ($data->type ==  1) {
            $hasil_kali = $request->pembilang * $data->kali;
            $hasil_keseluruhan = $hasil_kali / $request->penyebut;
            // end login hitungan
        } elseif ($data->type == 2) {
            $hasil_keseluruhan = $request->pembilang;
        }
        nilai_ukm::create([
            "id_subprogram_ukm" => $data->id,
            "id_users" => $id_user,
            "pembilang" => $request->pembilang,
            "penyebut" => $request->penyebut,
            "kali" => $data->kali,
            "hasil" => $hasil_keseluruhan,
            "target" => $request->target,
            "data_untuk" => $delay
        ]);

        return back();
    }

    public function export($startTime, $endTime)
    {
        $data = ukm::all();
        // return Excel::store(new UsersExport($users), 'users.xlsx');
        // (new ukmExport($data))->download('ukm.xlsx');
        // return 'The Export has Started';
        return Excel::download(new ukmExport($data, $startTime, $endTime), 'ukm.xlsx');
    }
}
