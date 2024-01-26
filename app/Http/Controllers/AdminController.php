<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Models\profile;
use App\Models\User;
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
}
