<?php

namespace App\Exports;

use App\Models\manajemen;
use App\Models\nilai_manajemen;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Throwable;

class ManajemenExport implements WithMultipleSheets, ShouldQueue
{
    use Exportable, Queueable;

    protected $data;
    protected $time;

    public function __construct($data, $time)
    {
        $this->data = $data;
        $this->time = $time;
    }
    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        $time = $this->time ? Carbon::parse($this->time) : null;

        // Mencari data capaian berdasarka User
        $id_user = auth()->user()->id;
        $data_capaian = nilai_manajemen::where('id_users', $id_user);

        $now = Carbon::now();

        $data_nilai = [];

        // Apply the between condition only if both $startTime and $endTime are not null
        if ($time) {
            $data_nilai = $data_capaian
                ->whereMonth('data_untuk', $time->month)
                ->whereYear('data_untuk', $time->year)
                ->get();
        } else {
            // If either $startTime or $endTime is null, fetch all data without the between condition
            $data_nilai = $data_capaian
                ->whereMonth('data_untuk', $now->month)
                ->whereYear('data_untuk', $now->year)
                ->get();
        }

        foreach ($this->data as $data) {
            $sheets[] = new ManajemenSheet($data, $data_nilai);
        }
        return $sheets;
    }


    public function failed(Throwable $exception)
    {
        // Handle Error
    }

    // /**
    //  * @return array
    //  */
    // public function registerEvents(): array
    // {
    //     return [
    //         BeforeExport::class  => function(BeforeExport $event) {
    //             $event->writer->setCreator('Hesan');
    //         },
    //         AfterSheet::class    => function(AfterSheet $event) {
    //             $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    //             $event->sheet->styleCells(
    //                 'B2:G8',
    //                 [
    //                     'borders' => [
    //                         'outline' => [
    //                             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
    //                             'color' => ['argb' => 'FFFF0000'],
    //                         ],
    //                     ]
    //                 ]
    //             );
    //         },
    //     ];
    // }
}
