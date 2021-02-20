@extends ('welcome')

@section ('content')
<h2 align='center'> O`quv markazlar ro`yxati</h2>
<div style="border:5px thead-dark; width: 157%; overflow: scroll; ">
  <div class="row">
    <div class="mb-3" style="margin: 5px;">
        <a href="/createcenter" class="btn btn-primary  active float-right" role="button" aria-pressed="true">O`quv markaz qo`shish</a>
    </div>
    <div class="mb-3" style="margin: 5px;">
        <a href="/report" class="btn btn-primary  active float-left" role="button" aria-pressed="true">hisobot</a>
    </div>
  </div>
      <div class="col-sm-8 blog-main" style="border:5px thead-dark; width: 121%; height: 100%; overflow: scroll; "> 
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" rolspan="2"  style="vertical-align: middle;" >#</th>
              <th scope="col"  rolspan="2"  style="vertical-align: middle;" >Name</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> Email</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> Address</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> Tell_number</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> Edu Center web site</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> Edu Center about</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> update</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> delete</th>
            </tr>
                <tr>
                  <form method="GET" action="{{ route('educenter.adminpanel')}}">
                    {{ csrf_field() }}
                  <td>
                    <input type="text" name="id" class="form-control" id="id" placeholder="id" >
                  </td>       
          
                  <td>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" >
                  </td>
                             
                  <td>
                    <input type="email" name="email" class="form-control" id="email" placeholder="email" >
                  </td>
                 
                  <td>
                    <input type="text" name="address" class="form-control" id="address" placeholder="address" >
                  </td>
                        
                  <td>
                    <input type="text" name="tell_number" class="form-control" id="tell_number" placeholder="tell_number" >
                  </td>
                    
                  <td>
                    <input type="text" name="web_site" class="form-control" id="web_site" placeholder="web_site" >
                  </td>
                          
                  <td>
                    <input type="text" name="about" class="form-control" id="about" placeholder="about" >
                  </td>
                          
                  <td>
                    <button type="submit" class="btn btn-primary  active float-right"> SEARCH </button>
                  </td>
                  </form>
                </tr>
          </thead>
          <!-- @if(count($eduCenters)) -->
                @foreach($eduCenters as $eduCenter)
                  <tbody>
                    <tr>
                      <th scope="row">{{$eduCenter ->id}}</th>  
                      <td><a href="/adminpanel/{{$eduCenter ->id}}">{{$eduCenter->name}}</a></td>
                      <td>{{$eduCenter->email}}</td>
                      <td>{{$eduCenter->address}}</td>
                      <td>{{$eduCenter->tell_number}}</td>
                      <td>{{$eduCenter->center_site}}</td>
                      <td>{{$eduCenter->center_about}}</td>
                      <td><a href="{{ url('EduCenter/'.$eduCenter->id.'/edit') }}" class="btn btn-primary  active float-right" role="button" aria-pressed="true">Update</a></td>
                      <td>
                        <form method="POST" action="{{ route('EduCenter.destroy', $eduCenter->id) }}" id="post-destroy">
                          @method('DELETE')
                          {{ csrf_field() }}
                          <input type="submit" value="Delete" class="btn  btn-danger active float-right">
                        </form>
                      </td>
                    </tr>
                  </tbody>
                @endforeach
          <!-- @endif -->
        </table>
        {{$eduCenters->links() }} 
      </div>
</div>
@endsection 