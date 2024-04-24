<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class OrdenesExport implements FromCollection
{
    use Exportable;

    protected $datos;

    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    public function collection()
    {
        return collect([$this->datos]);
    }
}
