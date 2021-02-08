@extends ('welcome')

@section ('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col"> T/R</th>
        <th scope="col"> Viloyat nomi</th>
        <th scope="col"> Jami o`quv markazlar soni</th>
        <th scope="col"> Jami o`quvchilar soni</th>
        <th scope="col"> Jami to`langan summa</th>
        <th scope="col"> ona tili va adabiyot</th>
        <th scope="col"> matematika</th>
        <th scope="col"> fizika</th>
        <th scope="col"> ingliz tili</th>
        <th scope="col"> biologiya</th>
        <th scope="col"> kimyo</th>
        <th scope="col"> rus tili</th>
        <th scope="col"> tarix</th>
        <th scope="col"> huquq</th>
        <th scope="col"> geografiya</th>
        <th scope="col"> student ona tili va adabiyot</th>
        <th scope="col"> student matematika</th>
        <th scope="col"> student fizika</th>
        <th scope="col"> student ingliz tili</th>
        <th scope="col"> student biologiya</th>
        <th scope="col"> student kimyo</th>
        <th scope="col"> student rus tili</th>
        <th scope="col"> student tarix</th>
        <th scope="col"> student huquq</th>
        <th scope="col"> student geografiya</th>
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
                <td>{{$report->students_science_1}}</td>
                <td>{{$report->students_science_2}}</td>
                <td>{{$report->students_science_3}}</td>
                <td>{{$report->students_science_4}}</td>
                <td>{{$report->students_science_5}}</td>
                <td>{{$report->students_science_6}}</td>
                <td>{{$report->students_science_7}}</td>
                <td>{{$report->students_science_8}}</td>
                <td>{{$report->students_science_9}}</td>
                <td>{{$report->students_science_10}}</td>
                <td>{{$report->students_science_id_1}}</td>
                <td>{{$report->students_science_id_2}}</td>
                <td>{{$report->students_science_id_3}}</td>
                <td>{{$report->students_science_id_4}}</td>
                <td>{{$report->students_science_id_5}}</td>
                <td>{{$report->students_science_id_6}}</td>
                <td>{{$report->students_science_id_7}}</td>
                <td>{{$report->students_science_id_8}}</td>
                <td>{{$report->students_science_id_9}}</td>
                <td>{{$report->students_science_id_10}}</td>


               
              </tr>
            </tbody>
          @endforeach
    @endif
    


</table>

@endsection