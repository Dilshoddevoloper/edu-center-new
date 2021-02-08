@extends ('welcome')

@section ('content')
<table class="table table-striped" border=5px thead-dark >
    <thead >
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
    @if(count($reports))
          @foreach($reports as $report)
            <tbody>
              <tr>
                <td>{{$report->id}}</td>
                <td>{{$report->region_name}}</td>
                <td>{{$report->edu_center_count}}</td>
                <td>{{$report->students_count}}</td>
                <td>{{$report->students_payment_summ}}</td>
                <td>{{$report->students_science_id_1}}</td>
                <td>{{$report->students_science_1}}</td>
                <td>{{$report->students_science_id_2}}</td>
                <td>{{$report->students_science_2}}</td>
                <td>{{$report->students_science_id_3}}</td>
                <td>{{$report->students_science_3}}</td>
                <td>{{$report->students_science_id_4}}</td>
                <td>{{$report->students_science_4}}</td>
                <td>{{$report->students_science_id_5}}</td>
                <td>{{$report->students_science_5}}</td>
                <td>{{$report->students_science_id_6}}</td>
                <td>{{$report->students_science_6}}</td>
                <td>{{$report->students_science_id_7}}</td>
                <td>{{$report->students_science_7}}</td>
                <td>{{$report->students_science_id_8}}</td>
                <td>{{$report->students_science_8}}</td>
                <td>{{$report->students_science_id_9}}</td>
                <td>{{$report->students_science_9}}</td>
                <td>{{$report->students_science_id_10}}</td>
                <td>{{$report->students_science_10}}</td>
                


               
              </tr>
            </tbody>
          @endforeach
    @endif
    


</table>

@endsection