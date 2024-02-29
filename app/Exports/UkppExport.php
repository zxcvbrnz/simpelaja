<?php

namespace App\Exports;

use App\Models\ukpp;
use App\Models\nilai_pelayanan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Throwable;

class UkppExport implements WithMultipleSheets, ShouldQueue
{
    use Exportable, Queueable;

    protected $data;
    protected $startTime;
    protected $endTime;

    public function __construct($data, $startTime, $endTime)
    {
        $this->data = $data;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }
    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        $startTime = $this->startTime ? Carbon::parse($this->startTime)->toDateTimeString() : null;
        $endTime = $this->endTime ? Carbon::parse($this->endTime)->toDateTimeString() : null;

        // Mencari data capaian berdasarka User
        $id_user = auth()->user()->id;
        $data_capaian = nilai_pelayanan::where('id_users', $id_user);

        $now = Carbon::now();

        $data_nilai = [];

        // Apply the between condition only if both $startTime and $endTime are not null
        if ($startTime && $endTime) {
            $data_nilai = $data_capaian->whereBetween('data_untuk', [$startTime, $endTime])->get();
        } else {
            // If either $startTime or $endTime is null, fetch all data without the between condition
            $data_nilai = $data_capaian
                ->whereMonth('data_untuk', $now->month)
                ->whereYear('data_untuk', $now->year)
                ->get();
        }

        foreach ($this->data as $data) {
            $sheets[] = new UkppSheet($data, $data_nilai);
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
