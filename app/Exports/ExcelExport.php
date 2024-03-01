<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExport implements FromArray, WithHeadings
{
    protected $pedidos;
    protected $headings;
    public function __construct($pedidos, $headings){
        $this->pedidos = $pedidos;
        $this->headings = $headings;
    }

    public function array(): array
    {
        return $this->pedidos;
    }

    public function headings() : array
    {
        return $this->headings;
    }
}