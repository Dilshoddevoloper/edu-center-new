@extends('welcome')


@section('content')

<form method="POST" action="/createcenter">
            {{ csrf_field() }} 
  <div class="container">
    <h3>Personal information</h3>
    <br>


    <div class='row'>  
      <div class="form-group col">
        <label for="name1">Edu Center Name</label>
        <input type="text" name="name" class="form-control" id="name1" placeholder="name" required>
      </div>
      
      <div class="form-group col">
        <label for="head_name">Head Name</label>
        <input type="text" name="head_name" class="form-control" id="head_name" placeholder="head name" required>
      </div>
    </div>
    
    <br>
    <h3>Contact information</h3>
    <br>
    
    <div class="row">
      
      <div class="form-group col">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="email" required>
      </div>
      

      
      <div class="form-group col">
        <label for="tell_number">tell_number</label>
        <input type="text" name="tell_number" class="form-control" id="tell_number" placeholder="tell_number" required>
      </div>
    

    
      <div class="form-group col">
        <label for="center_site">Edu Center Web Site</label>
        <input type="text" name="center_site" class="form-control" id="center_site" placeholder="center_site" required>
      </div>
    
    </div>
    <br>
    <h3>Territorial data</h3>
    <br>

    <div class='row'>  
      <div class="container box">
        <div class="form-group">
          <select name="region_id" id="region_id" class="form-control input-lg" data-dependent="city">
            <option value=""> Select region</option>
            @foreach($region_list as $name_uz)
            <option value="{{$name_uz->id}}">{{$name_uz->name_uz}}</option>
            @endforeach
          </select>
        </div>
        <br />
        <div class="form-group">
          <select name="city_id" id="city_id" class="form-control input-lg dynamic" >

            <option value=""> Select City</option>
          </select>
        </div>
      
        <br />
      </div>
        
    </div>
      <br>
    <div class="row">
       
      <div class="form-group col">
          <label for="address">Address</label>
          <input type="text" name="address" class="form-control" id="address" placeholder="address" required>
      </div>
      
    </div>
    <br>
    <h3>User data</h3>
    <br>  

    <div class="row">
      
        <div class="form-group col">
          <label for="name"> Name</label>
          <input type="text" name="user_name" class="form-control" id="name" placeholder="name" required>
        </div>
       
      
     
        <div class="form-group col">
          <label for="login">login</label>
          <input type="text" name="login" class="form-control" id="login" placeholder="login" required>
        </div>
      

      
        <div class="form-group col">
          <label for="password">password </label>
          <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
        </div>
      
    </div>

    <div class="row">
      <div class="form-group col">
          <label for="center_about">address</label>
          <textarea name="center_about" class="form-control" id="center_about" rows="3" placeholder="center_about" required></textarea>
      </div>
    </div>

    
    <button type="submit" class="btn btn-primary btn-lg active float-right"> Go </button>
  
  


  </div>
</form>
<script>

$(document).ready(function(){ 
  $('#region_id').change(function(){ 
    if($(this).val() != '')
    {
      var select = $(this).attr("id");
      var value =$(this).val();
      var dependent = 'region_id';
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{route('dynamicdependent1.fetch')}}",
        method:"POST",
        data:{select:select, value:value, _token:_token, dependent}, 
        success:function(result)
        {
          $('#city_id').html(result);
        }
      })
    }
  });
});
</script>

  @include('layouts.errors')
@endsection