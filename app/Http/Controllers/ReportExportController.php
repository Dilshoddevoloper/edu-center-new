<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportExportController extends Controller
{

    public function export() 
    {
        ini_set('allow_url_fopen', 1);
        return Excel::download(new ReportExport, 'report.xlsx');
    }
    // excelni dokumentatsiyasida dom degan narsani ko`rgandim, pdf, yoki boshqa fayl qilib yuklash un edi
}
 