<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FileExcelExport implements FromArray, WithHeadings
{
    protected $aux;
    protected $headings;

    public function __construct($aux, $headings){
        $this->aux = $aux;
        $this->headings = $headings;
    }

    public function array(): array
    {
        return $this->aux;
    }

    public function headings() : array
    {
        return $this->headings;
    }
}