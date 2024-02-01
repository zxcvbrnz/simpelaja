<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Models\nilai_ukm;
use App\Models\profile;
use App\Models\subprogram;
use App\Models\ukm;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function puskesmas()
    {
        $data = User::where('role', 'puskesmas')->get(['id', 'name', 'email']);
        return Inertia::render('Puskesmas/data', [
            'userpuskesmas' => $data
        ]);
    }

    public function detail_puskesmas($id)
    {
        $data = User::findOrFail($id, ['id', 'name']);
        $profil = $data->profil;
        $desa = $data->desa;
        $totalDesas = $desa->count();
        $totalPopulation = $desa->sum('jumlah_penduduk');
        $totalSdm = $data->sdm->sum('jumlah_sdm');

        return Inertia::render('Puskesmas/Detail', [
            'userpuskesmas' => $data,
            'profil'       => $profil,
            'totalDesa'       => $totalDesas,
            'totalPenduduk' => $totalPopulation,
            'sdm' => $totalSdm
        ]);
    }

    public function add_puskesmas()
    {
        return Inertia::render('Puskesmas/Tambah');
    }

    public function detail_puskesmas_desa($id)
    {
        $data = User::findOrFail($id, ['id', 'name']);
        $desa = $data->desa;
        return Inertia::render('Puskesmas/Desa', [
            'user' => $data,
            'desa' => $desa
        ]);
    }

    public function detail_puskesmas_sdm($id)
    {
        $data = User::findOrFail($id, ['id', 'name']);
        $sdm = $data->sdm;
        return Inertia::render('Puskesmas/SDM', [
            'user' => $data,
            'sdm' => $sdm
        ]);
    }

    public function detail_sub_ukm($id_program, $idsub)
    {
        $user = User::where('role', 'puskesmas')->get(['id', 'name']);

        $name_program = ukm::findOrFail($id_program, ['id', 'program']);

        $now = Carbon::now();

        $sub = subprogram::findOrFail($idsub, ['nama', 'target', 'str_target']);

        $data_ni = nilai_ukm::where('id_subprogram_ukm', $idsub)
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            // ->latest()
            ->get();
        return Inertia::render('Admin/Ukm/Detail', ['user' => $user, 'data' => $data_ni, 'sub' => $sub, 'program' => $name_program]);
    }
}
