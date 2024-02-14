<?php

namespace App\Http\Controllers;

use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PuskesmasController extends Controller
{
    public function index()
    {
        $data = User::findOrFail(Auth::user()->id, ['id', 'name']);
        $profil = $data->profil;
        $desa = $data->desa;
        $totalDesas = $desa->count();
        $totalPopulation = $desa->sum('jumlah_penduduk');
        $totalSdm = $data->sdm->sum('jumlah_sdm');

        return Inertia::render('detailProfil', [
            'userpuskesmas' => $data,
            'profil'        => $profil,
            'totalDesa'     => $totalDesas,
            'totalPenduduk' => $totalPopulation,
            'sdm'           => $totalSdm
        ]);
    }

    public function update_profil(Request $request)
    {
        $data = profile::where('id_users', $request->id_users)->first();

        if ($data) {
            $data->update($request->all());
        } else {
            profile::create($request->all());
        }
        return back();
    }
}
