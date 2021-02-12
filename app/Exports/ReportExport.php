<?php

namespace App\Exports;

use App\Invoice;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
class ReportExport implements FromView
{
    public function collection()
    {
        $arr = [1,2,3];
        return collect($arr);
    }

    // headerlarni yozib chiqib, from collection qilib yuklaysan endi xop
    public function view(): View
    {
        $raw1 = 'count(edu_centers.id) as edu_center_count';
        $result1 = DB::table('regions')
            ->leftJoin('edu_centers', 'edu_centers.region_id', '=', 'regions.id')
            ->select('regions.name_en as region_name', 'regions.id as region_id', DB::raw($raw1))
            ->groupBy('regions.id')
            ->orderBy('regions.c_order')
            ->get();
            
        $result2 = DB::table('regions')
            ->leftJoin('students', 'students.region_id', '=', 'regions.id')
            ->select('regions.name_en as region_name', 'regions.id as region_id',
             DB::raw('count(students.id) as students_count'))
            ->groupBy('regions.id')
            ->orderBy('regions.c_order')
            ->get();
            
        $result3 = DB::table('regions')
            ->leftJoin('students', 'students.region_id', '=', 'regions.id')
            ->select('regions.name_en as region_name', 'regions.id as region_id',
             DB::raw('sum(students.payment_summ) as students_payment_summ'))
            ->groupBy('regions.id')
            ->orderBy('regions.c_order')
            ->get(); 
            
            $id=1;
            foreach($result1 as $key => $a) { 
                $result1[$key]->students_count = $result2[$key]->students_count;
                $result1[$key]->students_payment_summ = $result3[$key]->students_payment_summ;
                $result1[$key]->id = $id;  
                // $result1[$key]->students_science_1 = $student1[$key]->students_science_1;
                $id ++;
            }
            
            return view('roles.export', ['reports' => $result1]);
       
    }
}
