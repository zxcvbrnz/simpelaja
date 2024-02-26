<?php

namespace App\Exports;

use App\Models\nilai_ukm;
use App\Models\subprogram;
use App\Models\ukm;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as FacadesView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;



class ukmExport implements FromCollection
{
    // use Exportable;

    // private $start_time;
    // private $end_time;
    // private $id_ukm;

    // public function __construct($start_time, $end_time, $id_ukm)
    // {
    //     $this->start_time = $start_time;
    //     $this->end_time = $end_time;
    //     $this->id_ukm = $id_ukm;
    // }

    public function collection()
    {
        // $Ukm = ukm::where('ud', $this->id_ukm)->get();
        return ukm::get();
    }
    // public function view(): View
    // {
    //     $Ukm = ukm::where('ud', $this->id_ukm);
    //     $data1 = subprogram::where('id_ukm', $this->id_ukm);
    //     if ($this->start_time) {
    //         $data = $data1
    //             // ->whereBetween('created_at', [
    //             //     $this->start_time,
    //             //     $this->end_time
    //             // ])
    //             ->get();
    //         return view('excel', [
    //             'data' => $data
    //         ]);
    //     } else {
    //         $data = $data1->latest()->get();
    //         return view('excelUkm', [
    //             'data' => $data
    //         ]);
    //     }
    //     // $data = nodemcu::where('id_alat',$this->id_alat)->whereBetween('created_at', [
    //     //         $this->start_time,
    //     //         $this->end_time])->get();
    //     // return view('excel',[
    //     //     'data' => $data
    //     // ]);
    // }
    // public function query()
    // {
    //     return nodemcu::query()->whereBetween('created_at', [
    //         $this->start_time,
    //         $this->end_time
    //     ]);
    // }
    // public function headings(): array
    // {
    //     return [
    //         'id',
    //         'id_alat',
    //         'Foto',
    //         'Waktu RTC',
    //         'Ketinggian air',
    //         'suhu',
    //         'created_at',
    //         'updated_at',
    //     ];
    // }
}
