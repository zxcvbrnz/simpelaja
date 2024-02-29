<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Controller extends BaseController
{
    public function index()
    {
        $data = User::findOrFail(Auth::user()->id, ['id', 'name']);

        $totalPuskesmas = User::where('role', 'puskesmas')->count();

        $desa = $data->desa;

        $totalDesas = $desa->count();

        $totalPopulation = Auth::user()->role == 'puseksmas' ? $desa->sum('jumlah_penduduk') : desa::get()->sum('jumlah_penduduk');

        $totalSdm = $data->sdm->sum('jumlah_sdm');

        return Inertia::render('Dashboard', ['desa' =>  $totalDesas, 'puskesmas' => $totalPuskesmas, 'penduduk' => $totalPopulation, 'sdm' => $totalSdm]);
    }
}
