<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nasionalmutu;
use App\Models\nilai_nasionalmutu;
use Carbon\Carbon;
use Inertia\Inertia;
use App\Exports\NasionalmutuExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class NasionalmutuController extends Controller
{
    public function mutu(Request $request)
    {
        // apakah ada request filter
        $startTime = $request->start_time ? Carbon::parse($request->start_time)->toDateTimeString() : null;
        $endTime = $request->end_time ? Carbon::parse($request->end_time)->toDateTimeString() : null;

        $data = nasionalmutu::get();

        // Mencari data capaian berdasarka User
        $id_user = $request->user()->id;
        $data_capaian = nilai_nasionalmutu::where('id_users', $id_user);

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
            $datanilai = $data_nilai->where('id_nasionalmutu', $d->id);
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

        return Inertia::render('NasionalMutu/index', ["data" => $data, 'capaian' => $capaian, 'grapik' => $grapik]);
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
        return Inertia::render("Admin/NasionalMutu/Edit", ['data' => $data]);
    }

    public function update_mutu(Request $request, $id)
    {
        $data = nasionalmutu::find($id);
        $data->update($request->all());
        return redirect()->back();
    }

    public function delete_mutu(Request $request)
    {
        $id = $request->id;
        nasionalmutu::find($id)->delete();
        return back();
    }

    public function nilai_mutu($id)
    {
        $user_id = auth()->user()->id;
        $sub = nasionalmutu::findOrFail($id);

        $data = nilai_nasionalmutu::where('id_nasionalmutu', $id)
            ->where('id_users', $user_id)->get();
        return Inertia::render("NasionalMutu/Data", ['data' => $data, 'sub' => $sub]);
    }

    public function creating_nilai_mutu(Request $request, $id)
    {
        $id_user = Auth::user()->id;
        $data = nasionalmutu::findOrFail($id);

        $nilai_4 = $data->nilai_4;
        $nilai_10 = $data->nilai_10;

        //start logic hitungan.
        $hasil_keseluruhan = '';
        if ($data->type ==  1) {
            $hasil_kali = $request->pembilang * $data->kali;
            $hasil_keseluruhan = $hasil_kali / $request->penyebut;
        } elseif ($data->type == 2) {
            $hasil_keseluruhan = $request->pembilang;
        }
        // end login hitungan

        // perbandingan untuk cari nilai_skala
        $nilai_skala = '';
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
            "target" => $data->target,
            "hasil" => $hasil_keseluruhan,
            "nilai" => $nilai_skala,
        ]);
        return back();
    }
    public function export($startTime, $endTime)
    {
        $data = nasionalmutu::all();
        // return Excel::store(new UsersExport($users), 'users.xlsx');
        // (new ukmExport($data))->download('ukm.xlsx');
        // return 'The Export has Started';
        return Excel::download(new NasionalmutuExport($data, $startTime, $endTime), 'Nasional Mutu.xlsx');
    }
}
