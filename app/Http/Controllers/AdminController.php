<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Models\manajemen;
use App\Models\nasionalmutu;
use App\Models\nilai_manajemen;
use App\Models\nilai_nasionalmutu;
use App\Models\nilai_ukm;
use App\Models\nilai_pelayanan;
use App\Models\pelayanan;
use App\Models\profile;
use App\Models\submanajemen;
use App\Models\subprogram;
use App\Models\ukm;
use App\Models\ukpp;
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
            'profil'        => $profil,
            'totalDesa'     => $totalDesas,
            'totalPenduduk' => $totalPopulation,
            'sdm'           => $totalSdm
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

    public function delete_puskesmas(Request $request)
    {
        User::findOrFail($request->id)->delete();
        profile::where('id_users', $request->id)->delete();
        return back();
    }

    public function subprogram($id)
    {
        $name = ukm::findOrFail($id, ['id', 'program']);
        $data = subprogram::where('id_ukm', $id)->get();
        return Inertia::render("Admin/Ukm/Subprogram/index", ['data' => $data, 'name' => $name]);
    }

    public function detail_sub_ukm($id_program, $idsub)
    {
        $user = User::where('role', 'puskesmas')->get(['id', 'name']);

        $name_program = ukm::findOrFail($id_program, ['id', 'program']);

        $now = Carbon::now()->subDay(env('DELAY_INPUT_DATA'));

        $sub = subprogram::findOrFail($idsub, ['id', 'nama', 'target', 'str_target']);

        $data_ni = nilai_ukm::where('id_subprogram_ukm', $idsub)
            ->whereMonth('data_untuk', $now->month)
            ->whereYear('data_untuk', $now->year)
            ->get(['id_users', 'created_at', 'hasil']);

        return Inertia::render('Admin/Ukm/Subprogram/Detail', ['user' => $user, 'data' => $data_ni, 'sub' => $sub, 'program' => $name_program]);
    }

    public function nilai_ukm($id_program, $idsub, $iduser)
    {
        $user = User::findOrFail($iduser, ['id', 'name']);
        $sub = subprogram::findOrFail($idsub);
        $program = ukm::findOrFail($id_program, ['id', 'program']);

        $data = nilai_ukm::where('id_subprogram_ukm', $idsub)
            ->where('id_users', $user->id)->get();
        return Inertia::render("Ukm/Data", ['program' => $program, 'data' => $data, 'sub' => $sub, 'username' => $user->name]);
    }

    public function subpelayanan($id)
    {
        $name = ukpp::findOrFail($id, ['id', 'pelayanan']);
        $data = pelayanan::where('id_ukpp', $id)->get();
        return Inertia::render("Admin/Ukpp/Subpelayanan/index", ['data' => $data, 'name' => $name]);
    }

    public function detail_sub_ukpp($id_pelayanan, $idsub)
    {
        $user = User::where('role', 'puskesmas')->get(['id', 'name']);

        $name_pelayanan = ukpp::findOrFail($id_pelayanan, ['id', 'pelayanan']);

        $now = Carbon::now()->subDay(env('DELAY_INPUT_DATA'));

        $sub = pelayanan::findOrFail($idsub, ['id', 'subpelayanan', 'target', 'str_target']);

        $data_ni = nilai_pelayanan::where('id_subpelayanan_ukpp', $idsub)
            ->whereMonth('data_untuk', $now->month)
            ->whereYear('data_untuk', $now->year)
            ->get(['id_users', 'created_at', 'hasil']);

        return Inertia::render('Admin/Ukpp/Subpelayanan/Detail', ['user' => $user, 'data' => $data_ni, 'sub' => $sub, 'pelayanan' => $name_pelayanan]);
    }

    public function nilai_ukpp($id_pelayanan, $idsub, $iduser)
    {
        $user = User::findOrFail($iduser, ['id', 'name']);
        $sub = pelayanan::findOrFail($idsub);
        $pelayanan = ukpp::findOrFail($id_pelayanan, ['id', 'pelayanan']);

        $data = nilai_pelayanan::where('id_subpelayanan_ukpp', $idsub)
            ->where('id_users', $user->id)->get();
        return Inertia::render("Ukpp/Data", ['pelayanan' => $pelayanan, 'data' => $data, 'sub' => $sub, 'username' => $user->name]);
    }

    public function submanajemen($id)
    {
        $name = manajemen::findOrFail($id, ['id', 'manajemen']);
        $data = submanajemen::where('id_manajemen', $id)->get();
        return Inertia::render("Admin/Manajemen/Sub/index", ['data' => $data, 'name' => $name]);
    }

    public function detail_sub_manajemen($id, $idsub)
    {
        $user = User::where('role', 'puskesmas')->get(['id', 'name']);

        $name_program = manajemen::findOrFail($id, ['id', 'manajemen']);

        $now = Carbon::now()->subDay(env('DELAY_INPUT_DATA'));

        $sub = submanajemen::findOrFail($idsub);

        $data_ni = nilai_manajemen::where('id_submanajemen', $idsub)
            ->whereMonth('data_untuk', $now->month)
            ->whereYear('data_untuk', $now->year)
            ->get(['id_users', 'created_at', 'hasil']);

        return Inertia::render('Admin/Manajemen/Sub/Detail', ['user' => $user, 'data' => $data_ni, 'sub' => $sub, 'manajemen' => $name_program]);
    }

    public function nilai_manajemen($id, $idsub, $iduser)
    {
        $user = User::findOrFail($iduser, ['id', 'name']);
        $sub = submanajemen::findOrFail($idsub);
        $manajemen = manajemen::findOrFail($id, ['id', 'manajemen']);

        $data = nilai_manajemen::where('id_submanajemen', $idsub)
            ->where('id_users', $user->id)->get();
        return Inertia::render("Manajemen/Data", ['manajemen' => $manajemen, 'data' => $data, 'sub' => $sub, 'username' => $user->name]);
    }

    public function mutu()
    {
        $data = nasionalmutu::get(["id", "mutu"]);
        return Inertia::render('Admin/NasionalMutu/index', ["data" => $data]);
    }

    public function detail_mutu($id)
    {
        $user = User::where('role', 'puskesmas')->get(['id', 'name']);

        $now = Carbon::now()->subDay(env('DELAY_INPUT_DATA'));

        $sub = nasionalmutu::findOrFail($id, ['id', 'mutu', 'target']);

        $data_ni = nilai_nasionalmutu::where('id_nasionalmutu', $id)
            ->whereMonth('data_untuk', $now->month)
            ->whereYear('data_untuk', $now->year)
            ->get(['id_users', 'created_at', 'hasil', 'nilai']);

        return Inertia::render('Admin/NasionalMutu/Detail', ['user' => $user, 'data' => $data_ni, 'sub' => $sub]);
    }

    public function nilai_mutu($id, $iduser)
    {
        $user = User::findOrFail($iduser, ['id', 'name']);

        $sub = nasionalmutu::findOrFail($id);

        $data = nilai_nasionalmutu::where('id_nasionalmutu', $id)
            ->where('id_users', $user->id)->get();
        return Inertia::render("NasionalMutu/Data", ['data' => $data, 'sub' => $sub, 'username' => $user->name]);
    }
}
