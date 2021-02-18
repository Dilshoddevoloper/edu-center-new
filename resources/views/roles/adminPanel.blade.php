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
    <!-- <div class="mb-3">
        <a href="adminpanel-export/pdf" class="btn btn-primary active float-left" role="button" aria-pressed="true">Download PDF</a>
    </div> -->
  </div>

  <!-- <div class="container"> -->
    <!-- <div class="row"> -->
      <div class="col-sm-8 blog-main" style="border:5px thead-dark; width: 121%; height: 100%; overflow: scroll; "> 
      <div class="table-responsive">
        <table id="example" class="display table table-bordered table-striped" style="width:100%">
          <thead>
              <tr>
                <th>#</th>
                <th> Name</th>
                <th> Email</th>
                <th> Address</th>
                <th> Tell_number</th>
                <th> Edu Center web site</th>
                <th> Edu Center about</th>
                <th> update</th>
                <th> delete</th>
              </tr>
          </thead>
          <tfoot style="display: table-header-group;">
              <tr>
                <th>#</th>
                <th class="input" id="input"> Name</th>
                <th> Email</th>
                <th> Address</th>
                <th> Tell_number</th>
                <th> Edu Center web site</th>
                <th> Edu Center about</th>
                <th> update</th>
                <th> delete</th>
              </tr>
          </tfoot>
          <tbody>
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
          </tbody>

        </table>
      </div>
      </div>
    <!-- </div>  -->
  <!-- </div> -->
</div>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> -->
<!-- <script type="text/javascript">
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            } );
        
            // DataTable
            var table = $('#example').DataTable({
                initComplete: function () {
                    // Apply the search
                    this.api().columns().every( function () {
                        var that = this;
        
                        $( 'input', this.footer() ).on( 'keyup change clear', function () {
                            if ( that.search() !== this.value ) {
                                that
                                    .search( this.value )
                                    .draw();
                            }
                        } );
                    } );
                }
            });
        
        } );        
    
</script> -->
@endsection 