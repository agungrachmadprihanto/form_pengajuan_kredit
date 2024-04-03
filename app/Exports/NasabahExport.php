<?php

namespace App\Exports;

use App\Models\Nasabah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
    use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NasabahExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    use Exportable;

    protected $from_date;
    protected $to_date;


    function __construct($from_date, $to_date)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function query()
    {
        $data = Nasabah::whereBetween('created_at', [$this->from_date, $this->to_date])->select('*')->orderBy('id');

        return $data;
    }

}
