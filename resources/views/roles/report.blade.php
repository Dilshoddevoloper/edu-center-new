@extends ('welcome')

@section ('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">T/r</th>
        <th scope="col"> Viloyat nomi</th>
        <th scope="col"> Jami o`quv markazlar soni</th>
        <th scope="col"> Jami o`quvchilar soni</th>
        <th scope="col"> Jami to`langan summa</th>
      </tr>
    </thead>
    @if(count($regions))
          @foreach($regions as $region)
            <tbody>
              <tr>
                <th scope="row">{{$region ->id-7}}</th>
                <td>{{$region->name_uz}}</a></td>
                
                
              </tr>
            </tbody>
          @endforeach
    @endif
    


</table>

@endsection