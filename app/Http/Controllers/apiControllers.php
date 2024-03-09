<?php

namespace App\Http\Controllers;

use App\Models\subprogram;
use App\Models\ukm;
use App\Models\User;
use Illuminate\Http\Request;

class apiControllers extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/user",
     *     tags={"Data Puskesmas"},
     *     summary="Get Daftar Data Puskesmas",
     *     description="Return Data Puskesmas(profile,desa,sdm)",
     *     operationId="puskesmas",
     *     @OA\Response(
     *         response="default",
     *         description="indikator broo"
     *     )
     * )
     */
    public function index()
    {
        $users = User::where('role', 'puskesmas')->with('profil', 'desa', 'sdm')->get(); // Mengambil semua data pengguna beserta profilnya
        $ukm = ukm::get();
        $subprograms = subprogram::get();
        $data = []; // Inisialisasi array untuk menampung data

        foreach ($users as $user) {
            // Menambahkan data pengguna dan profilnya ke dalam array
            $userData = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'profil' => [
                    'kepala_puskesmas' => $user->profil->kepala_puskesmas,
                    'alamat' => $user->profil->alamat_puskesmas,
                    'jumlah_pustu' => $user->profil->jumlah_pustu,
                    'jumlah_poskesdes' => $user->profil->jumlah_poskesdes,
                    'jumlah_ukbm' => $user->profil->jumlah_ukbm,
                ],
                'desa' => $user->desa->map(function ($desa) {
                    return [
                        'desa' => $desa->nama_desa,
                        'jumlah_penduduk' => $desa->jumlah_penduduk
                    ];
                })->toArray(),
                'sdm' => $user->sdm->map(function ($sdm) {
                    return [
                        'sdm' => $sdm->nama_sdm,
                        'jumlah' => $sdm->jumlah_sdm
                    ];
                })->toArray(),
                'indikator' => $ukm->map(function ($ukm) use ($subprograms) {
                    return [
                        $ukm->program => $subprograms->where('id_ukm', $ukm->id)->map(function ($subprogram) {
                            return [
                                'nama' => $subprogram->nama,
                                'Satuan' => $subprogram->satuan,
                            ];
                        })
                    ];
                })->toArray()
            ];

            $data[] = $userData;
        }

        return response()->json($data, 200); // Mengembalikan data dalam format JSON
    }
    /**
     * @OA\Get(
     *     path="/api/ukm",
     *     tags={"Upaya Kesehatan Masyarakat (UKM)"},
     *     summary="Get Daftar Program/Upaya",
     *     description="Return Daftar Data Program,Subprogram,Satuan,Target",
     *     operationId="ukm",
     *     @OA\Response(
     *         response="default",
     *         description="indikator bro"
     *     )
     * )
     */
    public function ukm()
    {
    }
    /**
     * @OA\Get(
     *     path="/api/ukpp",
     *     tags={"Upaya Kesehatan Perseorangan Dan Penunjang(UKPP)"},
     *     summary="Get Daftar data Jenis Variabel Pelayanan",
     *     description="Return Daftar Data Pelayanan,Subpelayanan,Satuan,Target",
     *     operationId="ukpp",
     *     @OA\Response(
     *         response="default",
     *         description="indikator bro"
     *     )
     * )
     */
    public function ukpp()
    {
    }
    /**
     * @OA\Get(
     *     path="/api/manajemen",
     *     tags={"Manajemen Puskesmas"},
     *     summary="Get Daftar data Jenis Variabel Manajemen",
     *     description="Return Daftar Data Manajemen,Submanajemen",
     *     operationId="manajemen",
     *     @OA\Response(
     *         response="default",
     *         description="indikator bro"
     *     )
     * )
     */
    public function manajemen()
    {
    }
    /**
     * @OA\Get(
     *     path="/api/nasional-mutu",
     *     tags={"Nasional Mutu"},
     *     summary="Get Daftar Data Indikator Nasional Mutu",
     *     description="Return Daftar Data Nasional Mutu,Target",
     *     operationId="nasinalmutu",
     *     @OA\Response(
     *         response="default",
     *         description="indikator bro"
     *     )
     * )
     */
    public function nasionalmutu()
    {
    }

    /**
     * @OA\Get(
     *     path="/api/{$id_user}/ukm",
     *     tags={"Nilai Indikator"},
     *     summary="Get Daftar Nilai UKM by $id_user",
     *     description="Return Daftar Nilai UKM by $id_user",
     *     operationId="nilai ukm",
     *     @OA\Response(
     *         response="default",
     *         description="indikator bro"
     *     ),
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="cari berdasarkan id pada user",
     *         required=true,
     *      ),
     *
     * )
     */
    public function nilai_ukm()
    {
    }
    /**
     * @OA\Get(
     *     path="/api/{$id_user}/ukpp",
     *     tags={"Nilai Indikator"},
     *     summary="Get Daftar Nilai UKPP by $id_user",
     *     description="Return Daftar Nilai UKPP by $id_user",
     *     operationId="nilai ukpp",
     *     @OA\Response(
     *         response="default",
     *         description="indikator bro"
     *     ),
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="cari berdasarkan id pada user",
     *         required=true,
     *      ),
     * )
     */
    public function nilai_ukpp()
    {
    }
    /**
     * @OA\Get(
     *     path="/api/{id_user}/manajemen",
     *     tags={"Nilai Indikator"},
     *     summary="Get Daftar Nilai Manajemen by $id_user",
     *     description="Return Daftar Nilai Manajemen by $id_user",
     *     operationId="nilai manajemen",
     *     @OA\Response(
     *         response="default",
     *         description="indikator bro"
     *     ),
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="cari berdasarkan id pada user",
     *         required=true,
     *      ),
     * )
     */
    public function nilai_manajemen()
    {
    }
    /**
     * @OA\Get(
     *     path="/api/{$id_user}/nasional-mutu",
     *     tags={"Nilai Indikator"},
     *     summary="Get Daftar Nilai Nasional Mutu by $id_user",
     *     description="Return Daftar Nilai Nasional Mutu by $id_user",
     *     operationId="nilai nasionalmutu",
     *     @OA\Response(
     *         response="default",
     *         description="indikator bro"
     *     ),
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="cari berdasarkan id pada user",
     *         required=true,
     *      ),
     * )
     */
    public function nilai_nasionalmutu()
    {
    }
}
