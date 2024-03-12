<?php

namespace App\Http\Controllers;

use App\Models\manajemen;
use App\Models\nasionalmutu;
use App\Models\nilai_ukm;
use App\Models\pelayanan;
use App\Models\submanajemen;
use App\Models\subprogram;
use App\Models\ukm;
use App\Models\ukpp;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class apiControllers extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     tags={"Data Puskesmas"},
     *     summary="Get Daftar Data Puskesmas",
     *     description="Return Data Puskesmas(profile,desa,sdm)",
     *     operationId="puskesmas",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     ),
     * )
     */
    public function index()
    {
        $users = User::where('role', 'puskesmas')->with('profil', 'desa', 'sdm')->get(); // Mengambil semua data pengguna beserta profilnya
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
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     ),
     * )
     */
    public function ukm()
    {
        $ukm = ukm::get();
        $subprograms = subprogram::get();
        $data = [];

        foreach ($ukm as $u) {
            $dataukm = [
                $u->program =>  $subprograms->where('id_ukm', $u->id)->map(function ($subprogram) {
                    return [
                        'nama' => $subprogram->nama,
                        'satuan' => $subprogram->satuan,
                        'target' => $subprogram->target . $subprogram->str_target
                    ];
                })->values()->toArray()
            ];

            $data[] = $dataukm;
        }
        return response()->json($data, 200);
    }
    /**
     * @OA\Get(
     *     path="/api/ukpp",
     *     tags={"Upaya Kesehatan Perseorangan Dan Penunjang(UKPP)"},
     *     summary="Get Daftar data Jenis Variabel Pelayanan",
     *     description="Return Daftar Data Pelayanan,Subpelayanan,Satuan,Target",
     *     operationId="ukpp",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     ),
     * )
     */
    public function ukpp()
    {
        $ukpp = ukpp::get();
        $sub = pelayanan::get();
        $data = [];

        foreach ($ukpp as $u) {
            $dataukpp = [
                $u->pelayanan =>  $sub->where('id_ukpp', $u->id)->map(function ($sub) {
                    return [
                        'nama' => $sub->subpelayanan,
                        'satuan' => $sub->satuan,
                        'target' => $sub->target . $sub->str_target
                    ];
                })->values()->toArray()
            ];

            $data[] = $dataukpp;
        }
        return response()->json($data, 200);
    }
    /**
     * @OA\Get(
     *     path="/api/manajemen-puskesmas",
     *     tags={"Manajemen Puskesmas"},
     *     summary="Get Daftar data Jenis Variabel Manajemen",
     *     description="Return Daftar Data Manajemen,Submanajemen",
     *     operationId="manajemen",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     ),
     * )
     */
    public function manajemen()
    {
        $manajemen = manajemen::get();
        $sub = submanajemen::get();
        $data = [];

        foreach ($manajemen as $u) {
            $datamanajemen = [
                $u->manajemen =>  $sub->where('id_manajemen', $u->id)->map(function ($sub) {
                    return [
                        'nama' => $sub->nama_submanajemen,
                        'nilai_0' => $sub->ket_nilai_0,
                        'nilai_4' => $sub->ket_nilai_4,
                        'nilai_7' => $sub->ket_nilai_7,
                        'nilai_10' => $sub->ket_nilai_10,
                    ];
                })->values()->toArray()
            ];

            $data[] = $datamanajemen;
        }
        return response()->json($data, 200);
    }
    /**
     * @OA\Get(
     *     path="/api/nasional-mutu",
     *     tags={"Nasional Mutu"},
     *     summary="Get Daftar Data Indikator Nasional Mutu",
     *     description="Return Daftar Data Nasional Mutu,Target",
     *     operationId="nasinalmutu",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     ),
     * )
     */
    public function nasionalmutu()
    {
        $typeNah = collect([
            ['value' => '>', 'label' => 1],
            ['value' => '<', 'label' => 2],
            ['value' => '>=', 'label' => 3],
            ['value' => '<=', 'label' => 4]
        ]);

        $mutu = nasionalmutu::get();
        $data = [];

        foreach ($mutu as $m) {
            $datamutu = [
                'nama' => $m->mutu,
                'target' => $typeNah->map(function ($type) use ($m) {
                    // Implement your logic here based on $type and $m
                    return $m->type_target == $type['label'] ? $type['value'] . $m->target . '%' : null;
                })->filter()->first(), // Filter out null values and get the first non-null value
                'nilai_4' => $typeNah->map(function ($type) use ($m) {
                    // Implement your logic here based on $type and $m
                    return $m->type_nilai_4 == $type['label'] ? $type['value'] . $m->nilai_4 . '%' : null;
                })->filter()->first(),
                'nilai_7' => $m->nilai_7_start . '-' . $m->nilai_7_end . '%',
                'nilai_10' => $typeNah->map(function ($type) use ($m) {
                    // Implement your logic here based on $type and $m
                    return $m->type_nilai_10 == $type['label'] ? $type['value'] . $m->nilai_10 . '%' : null;
                })->filter()->first(),
            ];
            $data[] = $datamutu;
        }

        return response()->json($data, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/{id_user}/ukm",
     *     tags={"Nilai Indikator"},
     *     summary="Get Daftar Nilai UKM by id_user",
     *     description="Return Daftar Nilai UKM by id_user",
     *     operationId="nilai ukm",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     ),
     *      @OA\Parameter(
     *         name="id_user",
     *         in="path",
     *         description="cari berdasarkan id pada user",
     *         required=true,
     *      ),
     *
     * )
     */
    public function nilai_ukm($id)
    {
        try {
            $user = user::findOrFail($id);
            $ukm = ukm::get();
            $subprograms = subprogram::get();
            $data = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'Indikator' => 'Upaya Kesehatan Masyarakat',
            ];

            foreach ($ukm as $u) {
                $dataukm = [
                    $u->program => $subprograms->where('id_ukm', $u->id)->map(function ($subprogram) use ($id) {
                        $nilais = nilai_ukm::where('id_users', $id)
                            ->where('id_subprogram_ukm', $subprogram->id)
                            ->select('created_at', 'hasil', 'pembilang', 'penyebut', 'target', 'data_untuk') // Select created_at along with nilai
                            ->get()
                            ->toArray();

                        // Iterate over each nilai_ukm object and extract attributes
                        $nilaiData = collect($nilais)->map(function ($nilai) use ($subprogram) {
                            return [
                                'data' => Carbon::parse($nilai['data_untuk'])->format('F Y'),
                                $subprogram->str_pembilang => $nilai['pembilang'] . ' ' . $subprogram->satuan,
                                $subprogram->str_penyebut => $nilai['penyebut'] . ' ' . $subprogram->satuan,
                                'capaian' => $nilai['hasil'] . $subprogram->str_target,
                                'target' => $nilai['target'] . $subprogram->str_target,
                                'created_at' => Carbon::parse($nilai['created_at'])->format('d F Y h:i'),
                            ];
                        });

                        return [
                            $subprogram->nama => $nilaiData->toArray() // Convert to array
                        ];
                    })->values()->toArray()
                ];

                // Add $dataukm directly to $data without merging
                $data += $dataukm;
            }

            return response()->json($data, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 400, 'message' => 'user tidak ditemukan'], 400);
        }
    }
    /**
     * @OA\Get(
     *     path="/api/{id_user}/ukpp",
     *     tags={"Nilai Indikator"},
     *     summary="Get Daftar Nilai UKPP by id_user",
     *     description="Return Daftar Nilai UKPP by id_user",
     *     operationId="nilai ukpp",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     ),
     *      @OA\Parameter(
     *         name="id_user",
     *         in="path",
     *         description="cari berdasarkan id pada user",
     *         required=true,
     *      ),
     * )
     */
    public function nilai_ukpp($id)
    {
    }
    /**
     * @OA\Get(
     *     path="/api/{id_user}/manajemen-puskesmas",
     *     tags={"Nilai Indikator"},
     *     summary="Get Daftar Nilai Manajemen by id_user",
     *     description="Return Daftar Nilai Manajemen by id_user",
     *     operationId="nilai manajemen",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     ),
     *      @OA\Parameter(
     *         name="id_user",
     *         in="path",
     *         description="cari berdasarkan id pada user",
     *         required=true,
     *      ),
     * )
     */
    public function nilai_manajemen($id)
    {
    }
    /**
     * @OA\Get(
     *     path="/api/{id_user}/nasional-mutu",
     *     tags={"Nilai Indikator"},
     *     summary="Get Daftar Nilai Nasional Mutu by id_user",
     *     description="Return Daftar Nilai Nasional Mutu by id_user",
     *     operationId="nilai nasionalmutu",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     ),
     *      @OA\Parameter(
     *         name="id_user",
     *         in="path",
     *         description="cari berdasarkan id pada user",
     *         required=true,
     *      ),
     * )
     */
    public function nilai_nasionalmutu($id)
    {
    }
}
