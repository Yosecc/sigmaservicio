<?php

namespace App\Exports;

use App\Newlester;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsletterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Newlester::select('mail','created_at')->orderBy('created_at','desc')->get();
    }
}
