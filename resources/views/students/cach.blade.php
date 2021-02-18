    <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" rowspan="2">#</th>
              <th scope="col"> Name</th>
              <th scope="col"> Email</th>
              <th scope="col"> Address</th>
              <th scope="col"> Tell_number</th>
              <th scope="col"> Edu Center web site</th>
              <th scope="col"> Edu Center about</th>
              <th scope="col" rowspan="2"> update</th>
              <th scope="col" rowspan="2"> delete</th>
            </tr>
            <tr>
              <th scope="col">
                <select name="name" id="name" class="form-control input-lg">
                  <option value="barchasi"></option>    
                  <option value="barchasi"></option>           
                  <option value="barchasi"></option>     
                </select> 
              </th>      
            </th>
              <th scope="col">
                <select name="name" id="name" class="form-control input-lg">
                  <option value="barchasi"></option>                 
                </select>       
              </th>
              <th scope="col">
                <select name="name" id="name" class="form-control input-lg">
                  <option value="barchasi"></option>                 
                </select>       
              </th>
              <th scope="col">
                <select name="name" id="name" class="form-control input-lg">
                  <option value="barchasi"></option>                 
                </select>       
              </th>
              <th scope="col">
                <select name="name" id="name" class="form-control input-lg">
                  <option value="barchasi"></option>                 
                </select>       
              </th>
              <th scope="col">
                <select name="name" id="name" class="form-control input-lg">
                  <option value="barchasi"></option>                 
                </select>       
              </th>
            </tr>
          </thead>
          @if(count($EduCenters))
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
          @endif
          
    </table> 

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>