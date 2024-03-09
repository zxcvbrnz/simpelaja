<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="SimpelAja API Documentation",
 *      description="Dokumentasi API Simpelaja.id adalah sumber informasi resmi yang memberikan panduan lengkap tentang penggunaan API yang disediakan oleh platform tersebut. Dokumentasi ini mencakup semua endpoint yang tersedia, beserta parameter yang diperlukan dan jenis respons yang diharapkan. Pengguna akan menemukan contoh-contoh penggunaan API untuk berbagai fitur yang ditawarkan oleh Simpelaja.id, seperti pengelolaan akun, penjadwalan layanan, dan interaksi dengan data. Dokumentasi ini dirancang untuk memudahkan pengembang memahami dan memanfaatkan API Simpelaja.id dalam pengembangan aplikasi atau integrasi dengan sistem lainnya.",
 *      @OA\Contact(
 *          email="tebarkode@gmail.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )
 */
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
