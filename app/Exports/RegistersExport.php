<?php

namespace App\Exports;

use App\Winner;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegistersExport implements FromCollection
{
    public $reviews;

    public function __construct($reviews)
    {
        $this->reviews = $reviews;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->reviews);
    }
}
