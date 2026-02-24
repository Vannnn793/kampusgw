<?php

namespace App\Exports;

use App\Models\Admission;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AdmissionsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $year;

    public function __construct($year = null)
    {
        $this->year = $year;
    }

    public function collection()
    {
        // Sesuaikan dengan nama relasi di model Admission lu ya
        $query = Admission::with(['prodi', 'faculty']);

        if ($this->year) {
            $query->where('tahun_akademik', $this->year);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'Email',
            'No. WhatsApp',
            'Program Studi',
            'Fakultas',
            'Tahun Akademik'
        ];
    }

    public function map($admission): array
    {
        static $number = 0;
        $number++;

        return [
            $number,
            $admission->nama_lengkap,
            $admission->email,
            $admission->no_hp,
            $admission->prodi ? $admission->prodi->name : '-',
            $admission->faculty ? $admission->faculty->name : '-',
            $admission->tahun_akademik,
        ];
    }
}