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
              <th scope="col"  rolspan="2"  style="vertical-align: middle;" > Name</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> Email</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> Address</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> Tell_number</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> Edu Center web site</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> Edu Center about</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> update</th>
              <th scope="col" rolspan="2" style="vertical-align: middle;"> delete</th>
            </tr>
                <tr>
                  <form method="GET" action="{{ route('educenter.adminpanel')}}" >
                    {{ csrf_field() }}
                    <div class="container">
                        <div class='row'>  
                          <div class="form-group col">
                            <td>
                              <input type="text" name="id" class="form-control"  placeholder="Id">
                            </td>
                          </div>
                        </div>
                    </div>
                  </form>

                  <form method="GET" action="{{ route('educenter.adminpanel')}}" role="search">
                    {{ csrf_field() }}
                      <div class="container">
                        <div class='row'>  
                          <div class="form-group col">
                            <td>
                              <input type="text" name="name" class="form-control" id="name" placeholder="Name" >
                            </td>
                          </div>
                        </div>
                      </div>
                  </form>

                  <form method="GET" action="{{ route('educenter.adminpanel')}}">
                    {{ csrf_field() }}
                      <div class="container">
                        <div class='row'>  
                          <div class="form-group col">
                            <td>
                              <input type="email" name="email" class="form-control" id="email" placeholder="email" >
                            </td>
                          </div>
                        </div>
                      </div>
                  </form>

                  <form method="GET" action="{{ route('educenter.adminpanel')}}">
                    {{ csrf_field() }}
                      <div class="container">
                        <div class='row'>  
                          <div class="form-group col">
                            <td>
                              <input type="text" name="address" class="form-control" id="address" placeholder="address" >
                            </td>
                          </div>
                        </div>
                      </div>
                  </form>

                  <form method="GET" action="{{ route('educenter.adminpanel')}}">
                    {{ csrf_field() }}
                      <div class="container">
                        <div class='row'>  
                          <div class="form-group col">
                            <td>
                              <input type="text" name="tell_number" class="form-control" id="tell_number" placeholder="tell_number" >
                            </td>
                          </div>
                        </div>
                      </div>
                  </form>

                  <form method="GET" action="{{ route('educenter.adminpanel')}}">
                    {{ csrf_field() }}
                      <div class="container">
                        <div class='row'>  
                          <div class="form-group col">
                            <td>
                              <input type="text" name="web_site" class="form-control" id="web_site" placeholder="web_site" >
                            </td>
                          </div>
                        </div>
                      </div>
                  </form>

                  <form method="GET" action="{{ route('educenter.adminpanel')}}">
                    {{ csrf_field() }}
                      <div class="container">
                        <div class='row'>  
                          <div class="form-group col">
                            <td>
                              <input type="text" name="about" class="form-control" id="about" placeholder="about" >
                            </td>
                          </div>
                        </div>
                      </div>
                  </form>

                  <form method="GET" action="{{ route('educenter.adminpanel')}}">
                    {{ csrf_field() }}
                      <div class="">
                        <div class="form-group">
                          <div class="form-group">
                            <td>
                              <button type="submit" class="btn btn-primary  active float-right"> SEARCH </button>
                            </td>
                          </div>
                        </div>
                      </div>         
                  </form>
                </tr>
          </thead>
          <!-- @if(count($EduCenters)) -->
                @foreach($EduCenters as $EduCenter)
                  <tbody>
                    <tr>
                      <th scope="row">{{$EduCenter ->id}}</th>
                      <td><a href="/adminpanel/{{$EduCenter ->id}}">{{$EduCenter->name}}</a></td>
                      <td>{{$EduCenter->email}}</td>
                      <td>{{$EduCenter->address}}</td>
                      <td>{{$EduCenter->tell_number}}</td>
                      <td>{{$EduCenter->center_site}}</td>
                      <td>{{$EduCenter->center_about}}</td>
                      <td><a href="{{ url('EduCenter/'.$EduCenter->id.'/edit') }}" class="btn btn-primary  active float-right" role="button" aria-pressed="true">Update</a></td>
                      <td>
                        <form method="POST" action="{{ route('EduCenter.destroy', $EduCenter->id) }}" id="post-destroy">
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
      </div>
</div>
<!-- <<<<<<< HEAD

=======
>>>>>>> e6917c89682d88ae4bd8322df8d511ef1c41ece3 -->
@endsection 