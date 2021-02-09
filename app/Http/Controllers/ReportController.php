<?php

namespace App\Http\Controllers;
use App\Regions;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    $name = 'Zohid';
    public function index()
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

            $science9 = DB::table('regions')
            ->leftJoin('students', 'students.region_id', '=', 'regions.id' ) 
            ->select('regions.name_en as region_name', 'regions.id as region_id',
             DB::raw(
                'SUM(CASE WHEN students.science_id = 1 THEN students.payment_summ ELSE 0 END) AS students_science_1,
                SUM(CASE WHEN students.science_id = 2 THEN students.payment_summ ELSE 0 END) AS students_science_2,
                SUM(CASE WHEN students.science_id = 3 THEN students.payment_summ ELSE 0 END) AS students_science_3,
                SUM(CASE WHEN students.science_id = 4 THEN students.payment_summ ELSE 0 END) AS students_science_4,
                SUM(CASE WHEN students.science_id = 5 THEN students.payment_summ ELSE 0 END) AS students_science_5,
                SUM(CASE WHEN students.science_id = 6 THEN students.payment_summ ELSE 0 END) AS students_science_6,
                SUM(CASE WHEN students.science_id = 7 THEN students.payment_summ ELSE 0 END) AS students_science_7,
                SUM(CASE WHEN students.science_id = 8 THEN students.payment_summ ELSE 0 END) AS students_science_8,
                SUM(CASE WHEN students.science_id = 9 THEN students.payment_summ ELSE 0 END) AS students_science_9,
                SUM(CASE WHEN students.science_id = 10 THEN students.payment_summ ELSE 0 END) AS students_science_10'     
                ))  
            ->groupBy('regions.id')
            ->orderBy('regions.c_order')
            ->get();
                // dd($science9);
            $student1 = DB::table('regions')
            ->leftJoin('students', 'students.region_id', '=', 'regions.id' ) 
            ->select('regions.name_en as region_name', 'regions.id as region_id',
                DB::raw(
                'SUM(CASE WHEN students.science_id = 1 THEN students.science_id ELSE 0 END) AS students_science_id_1,
                SUM(CASE WHEN students.science_id = 2 THEN students.science_id ELSE 0 END) AS students_science_id_2,
                SUM(CASE WHEN students.science_id = 3 THEN students.science_id ELSE 0 END) AS students_science_id_3,
                SUM(CASE WHEN students.science_id = 4 THEN students.science_id ELSE 0 END) AS students_science_id_4,
                SUM(CASE WHEN students.science_id = 5 THEN students.science_id ELSE 0 END) AS students_science_id_5,
                SUM(CASE WHEN students.science_id = 6 THEN students.science_id ELSE 0 END) AS students_science_id_6,
                SUM(CASE WHEN students.science_id = 7 THEN students.science_id ELSE 0 END) AS students_science_id_7,
                SUM(CASE WHEN students.science_id = 8 THEN students.science_id ELSE 0 END) AS students_science_id_8,
                SUM(CASE WHEN students.science_id = 9 THEN students.science_id ELSE 0 END) AS students_science_id_9,
                SUM(CASE WHEN students.science_id = 10 THEN students.science_id ELSE 0 END) AS students_science_id_10            
                    ' ) )
            ->groupBy('regions.id')
            ->orderBy('regions.c_order')
            ->get();


            $id = 1;
            foreach($result1 as $key => $a) { 
                $result1[$key]->students_count = $result2[$key]->students_count;
                $result1[$key]->students_payment_summ = $result3[$key]->students_payment_summ;
                $result1[$key]->id = $id;  
                $result1[$key]->students_science_1 = $science9[$key]->students_science_1;
                $result1[$key]->students_science_2 = $science9[$key]->students_science_2;
                $result1[$key]->students_science_3 = $science9[$key]->students_science_3;
                $result1[$key]->students_science_4 = $science9[$key]->students_science_4;
                $result1[$key]->students_science_5 = $science9[$key]->students_science_5;
                $result1[$key]->students_science_6 = $science9[$key]->students_science_6;
                $result1[$key]->students_science_7 = $science9[$key]->students_science_7;
                $result1[$key]->students_science_8 = $science9[$key]->students_science_8;
                $result1[$key]->students_science_9 = $science9[$key]->students_science_9;
                $result1[$key]->students_science_10 = $science9[$key]->students_science_10;
                $result1[$key]->students_science_id_1 = $student1[$key]->students_science_id_1;
                $result1[$key]->students_science_id_2 = $student1[$key]->students_science_id_2;
                $result1[$key]->students_science_id_3 = $student1[$key]->students_science_id_3;
                $result1[$key]->students_science_id_4 = $student1[$key]->students_science_id_4;
                $result1[$key]->students_science_id_5 = $student1[$key]->students_science_id_5;
                $result1[$key]->students_science_id_6 = $student1[$key]->students_science_id_6;
                $result1[$key]->students_science_id_7 = $student1[$key]->students_science_id_7;
                $result1[$key]->students_science_id_8 = $student1[$key]->students_science_id_8;
                $result1[$key]->students_science_id_9 = $student1[$key]->students_science_id_9;
                $result1[$key]->students_science_id_10 = $student1[$key]->students_science_id_10;


                
                $id ++;
            }

            // dd($result1);
        return view('roles.report', ['reports' => $result1]);
    }
}
