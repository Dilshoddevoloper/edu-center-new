<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportExportController extends Controller
{
    private $excel;

    public function _construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function export()
    {
        return $this->excel->download(new ReportExport, 'report.xlsx');
    }
}
 