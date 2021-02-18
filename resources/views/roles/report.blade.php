@extends ('welcome')

@section ('content')
<div class="mb-3" style="margin: 5px !important;">
    <a href="adminpanel-export/pdf" class="btn btn-primary active float-left" role="button" aria-pressed="true">Download PDF</a>
</div>
<div class="mb-3" style="margin: 5px !important;">
    <a href="/report/export" class="btn btn-primary active float-left" role="button" aria-pressed="true">Download XLSX</a>
</div>

<div class="overflow" style="width: 103.5%; overflow: scroll; ">
 
  @include('roles.export', $reports)
  
</div>

@endsection