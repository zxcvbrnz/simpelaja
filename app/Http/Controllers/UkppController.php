<?php

namespace App\Http\Controllers;

use App\Models\nilai_pelayanan;
use Illuminate\Http\Request;
use App\Models\ukpp;
use App\Models\pelayanan;
use App\Models\User;
use Carbon\Carbon;
use Inertia\Inertia;
use App\Exports\UkppExport;
use Maatwebsite\Excel\Facades\Excel;
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
        return Inertia::render("Admin/Ukpp/Add");
    }
    public function creating_pelayanan(Request $request)
    {
        ukpp::create([
            "pelayanan" => $request->pelayanan,
        ]);
        return back();
    }
    public function edit_pelayanan($id)
    {
        $data = ukpp::find($id);
        return Inertia::render("Admin/Ukpp/Edit", ['data' => $data]);
    }
    public function update_pelayanan(Request $request, $id)
    {
        $data = ukpp::find($id);
        $data->update($request->all());
        return back();
    }
    public function delete_pelayanan(Request $request)
    {
        $id = $request->id;
        ukpp::where('id', $id)->delete();
        pelayanan::where('id_ukpp', $id)->delete();
        return redirect()->back();
    }

    // ======== SEMUA FUNCTION SUBPELAYANAN ==========
    public function subpelayanan(Request $request, $id)
    {
        // apakah ada request filter
        $startTime = $request->start_time ? Carbon::parse($request->start_time)->toDateTimeString() : null;
        $endTime = $request->end_time ? Carbon::parse($request->end_time)->toDateTimeString() : null;

        $name = ukpp::findOrFail($id, ['id', 'pelayanan']);
        $data = pelayanan::where("id_ukpp", $id)->get();
        // $data = pelayanan::where("id_ukpp", $id)->get(["id", "subpelayanan"]);

        // Mencari data capaian berdasarka User
        $id_user = $request->user()->id;
        $data_capaian = nilai_pelayanan::where('id_users', $id_user);

        // data capaian yang dibuat oleh user terkait dengan id_ukpp
        $now = Carbon::now();

        $data_nilai = [];

        if ($startTime && $endTime) {
            $data_nilai = $data_capaian->whereBetween('data_untuk', [$startTime, $endTime])->get();
        } else {
            $data_nilai =  $data_capaian
                ->whereMonth('data_untuk', $now->month)
                ->whereYear('data_untuk', $now->year)
                ->get();
        }

        $grapik = [];

        // Calculate average hasil for each subprogram
        foreach ($data as $d) {
            $datanilai = $data_nilai->where('id_subpelayanan_ukpp', $d->id);
            if ($datanilai->count() > 0) {
                $total = $datanilai->sum('hasil');
                $average = $total / $datanilai->count();
                $grapik[$d->id] = $average; // Store average value for each subprogram
            } else {
                $grapik[$d->id] = 0; // If no data found, set average to 0
            }
        }
        $capaian = $data_capaian
            ->whereMonth('data_untuk', $now->month)
            ->whereYear('data_untuk', $now->year)->get();

        return Inertia::render("Ukpp/SubPelayanan", ['data' => $data, 'name' => $name, 'capaian' => $capaian, 'grapik' => $grapik]);
    }
    public function create_subpelayanan($id)
    {
        $data =  ukpp::findOrFail($id, ['id', 'pelayanan']);
        return Inertia("Admin/Ukpp/Subpelayanan/Add", compact("data"));
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
        return back();
    }
    public function edit_subpelayanan($idukpp, $idsub)
    {
        $data = ukpp::findOrFail($idukpp);
        $datasub = pelayanan::find($idsub);
        return Inertia::render("Admin/Ukpp/Subpelayanan/Edit", ['data' => $data, 'datasub' => $datasub]);
    }
    public function update_subpelayanan(Request $request)
    {
        $id = $request->id;
        $data = pelayanan::find($id);
        $data->update($request->all());
        return back();
    }
    public function delete_subpelayanan(Request $request)
    {
        $id = $request->id;
        pelayanan::where("id", $id)->delete();
        return back();
    }
    // ========== SEMUA FUNCTION NILAI_PELAYANAN_UKPP ==========
    public function nilai_pelayanan(Request $request, $id_pelayanan, $idsub)
    {
        $user_id = auth()->user()->id;
        $sub = pelayanan::findOrFail($idsub);
        $pelayanan = ukpp::findOrFail($id_pelayanan, ['id', 'pelayanan']);

        $data = nilai_pelayanan::where('id_subpelayanan_ukpp', $idsub)
            ->where('id_users', $user_id)->get();
        return Inertia::render("Ukpp/Data", ['pelayanan' => $pelayanan, 'data' => $data, 'sub' => $sub]);
    }

    public function create_nilai()
    {
        return inertia::render("");
    }
    public function creating_nilai(Request $request, $id)
    {
        $data = pelayanan::findOrFail($id);
        $id_user = Auth::user()->id;

        $delay = Carbon::now()->subDay(env('DELAY_INPUT_DATA'));
        $check = nilai_pelayanan::where('id_users', $id_user)
            ->where('id_subpelayanan_ukpp', $data->id)
            ->whereMonth('created_at', $delay->month)
            ->whereYear('created_at', $delay->year);
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
        nilai_pelayanan::create([
            "id_subpelayanan_ukpp" => $data->id,
            "id_users" => $id_user,
            "penyebut" => $request->penyebut,
            "pembilang" => $request->pembilang,
            "kali" => $data->kali,
            "hasil" => $hasil_keseluruhan,
            "target" => $request->target,
            "data_untuk" => $delay
        ]);
    }
    public function export($startTime, $endTime)
    {
        $data = ukpp::all();
        // return Excel::store(new UsersExport($users), 'users.xlsx');
        // (new ukmExport($data))->download('ukm.xlsx');
        // return 'The Export has Started';
        return Excel::download(new UkppExport($data, $startTime, $endTime), 'ukpp.xlsx');
    }
}
