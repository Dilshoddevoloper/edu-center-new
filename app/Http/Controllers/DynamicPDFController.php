<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index(){
        $results = $this->get_customer_data();
        // return view('roles.adminPanel')->with('customer_data',$customer_data);

        return view('roles.adminPanel')->with('results',$results);
        // return view('roles.report', ['reports' => $result1]);        
    }

    function get_customer_data(){
        // $results = DB::table('edu_centers')
        //                 ->limit(10)
        //                 ->get();
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
        $results = $result1;
        return $results;
    }

    function pdf(){
        
        $pdf = PDF::loadHTML($this->convert_customer_data_to_html());
        return $pdf->download('report.pdf');
    }

    function convert_customer_data_to_html(){
        $results = $this->get_customer_data();

        // nega edu centerni ma'lumotlari buyerda, hisobotni emas shu edu centerdan masmi hisobot
        // hisobotni yuklashga edu centerni aloqasi yoq
        // edu centerlarni yuklab korsataman hisobotni keyin ozing yuklaysan
        $output = '
        <table class="table table-striped">
            <thead>
                <tr >
                    <th scope="col"  rowspan="2" style="vertical-align: middle;"> T/R</th>
                    <th scope="col"  rowspan="2" style="vertical-align: middle;"> Viloyat nomi</th>
                    <th scope="col"  rowspan="2" style="vertical-align: middle;"> Jami o`quv markazlar soni</th>
                    <th scope="col"  rowspan="2"  style="vertical-align: middle;"> Jami o`quvchilar soni</th>
                    <th scope="col"  rowspan="2"  style="vertical-align: middle;"> Jami to`langan summa</th>
                    <th scope="col" colspan="2"  style="vertical-align: middle;"> ona tili va adabiyot</th>
                    <th scope="col" colspan="2"  style="vertical-align: middle;"> matematika</th>
                    <th scope="col" colspan="2"  style="vertical-align: middle;"> fizika</th>
                    <th scope="col" colspan="2"  style="vertical-align: middle;"> ingliz tili</th>
                    <th scope="col" colspan="2"  style="vertical-align: middle;"> biologiya</th>
                    <th scope="col" colspan="2"  style="vertical-align: middle;"> kimyo</th>
                    <th scope="col" colspan="2"  style="vertical-align: middle;"> rus tili</th>
                    <th scope="col" colspan="2"  style="vertical-align: middle;"> tarix</th>
                    <th scope="col" colspan="2"  style="vertical-align: middle;"> huquq</th>
                    <th scope="col" colspan="2"  style="vertical-align: middle;"> geografiya</th>
                </tr>
                <tr>
                    <th scope="col">o`quvchilar soni</th>
                    <th scope="col">jami to`langan summa</th>
                    <th scope="col">o`quvchilar soni</th>
                    <th scope="col">jami to`langan summa</th>
                    <th scope="col">o`quvchilar soni</th>
                    <th scope="col">jami to`langan summa</th>
                    <th scope="col">o`quvchilar soni</th>
                    <th scope="col">jami to`langan summa</th>
                    <th scope="col">o`quvchilar soni</th>
                    <th scope="col">jami to`langan summa</th>
                    <th scope="col">o`quvchilar soni</th>
                    <th scope="col">jami to`langan summa</th>
                    <th scope="col">o`quvchilar soni</th>
                    <th scope="col">jami to`langan summa</th>
                    <th scope="col">o`quvchilar soni</th>
                    <th scope="col">jami to`langan summa</th>
                    <th scope="col">o`quvchilar soni</th>
                    <th scope="col">jami to`langan summa</th>
                    <th scope="col">o`quvchilar soni</th>
                    <th scope="col">jami to`langan summa</th>
                </tr>
            </thead>
        ';

        foreach($results as $report)
        {
            $output .='
            <tr>
                <th scope="row">'.$report->id.'</th>
                <td>'.$report->region_name.'</td>
                <td>'.$report->edu_center_count.'</td>
                <td>'.$report->students_count.'</td>
                <td>'.$report->students_payment_summ.'</td>
                <td>'.$report->students_science_id_1.'</td>
                <td>'.$report->students_science_1.'</td>
                <td>'.$report->students_science_id_2.'</td>
                <td>'.$report->students_science_2.'</td>
                <td>'.$report->students_science_id_3.'</td>
                <td>'.$report->students_science_3.'</td>
                <td>'.$report->students_science_id_4.'</td>
                <td>'.$report->students_science_4.'</td>
                <td>'.$report->students_science_id_5.'</td>
                <td>'.$report->students_science_5.'</td>
                <td>'.$report->students_science_id_6.'</td>
                <td>'.$report->students_science_6.'</td>
                <td>'.$report->students_science_id_7.'</td>
                <td>'.$report->students_science_7.'</td>
                <td>'.$report->students_science_id_8.'</td>
                <td>'.$report->students_science_8.'</td>
                <td>'.$report->students_science_id_9.'</td>
                <td>'.$report->students_science_9.'</td>
                <td>'.$report->students_science_id_10.'</td>
                <td>'.$report->students_science_10.'</td>
            </tr>
            ';
        }

        $output .= '</table>';
        return $output;
    }
}
