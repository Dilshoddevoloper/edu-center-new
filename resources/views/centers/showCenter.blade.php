@extends('welcome')

@section ('content')
    <!-- <div>
    <p><a href="/adminpanel" class="btn-default"> Go back</a></p>
    <h3><a href="/adminpanel/{{$EduCenters->id}}">{{$EduCenters->name}}</a></h3>
    <p>{{$EduCenters->email}}</p>
    <p>{{$EduCenters->address}}</p>
    </div> -->

<div>
    <div class="mb-3">
    <a href="{{ url('EduCenter/'.$EduCenters->id.'/edit') }}" class="btn btn-primary  active float-right" role="button" aria-pressed="true">Update</a>
    </div>

    <div class="mb-3">
        <form method="POST" action="{{ route('EduCenter.destroy', $EduCenters->id) }}" id="post-destroy">
            @method('DELETE')
            {{ csrf_field() }}
            <input type="submit" value="Delete" class="btn  btn-danger active float-right">
        </form>
    </div>

    <div class="mb-3">
    <a href="/adminpanel" class="btn btn-primary  active float-left" role="button" aria-pressed="true">Go back</a>
    </div>
</div>
<br>
<br>
<!-- <h2>About {{$EduCenters->name}} </h2>
<ol>
   <p> Edu senter name : {{$EduCenters->name}}</p>
   <p> Edu senter email: {{$EduCenters->email}}</p>
   <p> Edu senter address: {{$EduCenters->address}}</p>
   <p> Edu senter tell number: {{$EduCenters->tell_number}}</p>
   <p> Edu senter web site:  {{$EduCenters->center_site}}</p>
   <p> Edu senter about: {{$EduCenters->center_about}} </p>
</ol> -->

<style>
 body 
  {
      background-color: #f9f9fa
  }

  .padding {
      padding: 3rem !important
  }

  .user-card-full {
      overflow: hidden
  }

  .card {
      border-radius: 5px;
      -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
      box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
      border: none;
      margin-bottom: 30px
  }

  .m-r-0 {
      margin-right: 0px
  }

  .m-l-0 {
      margin-left: 0px
  }

  .user-card-full .user-profile {
      border-radius: 5px 0 0 5px
  }

  .bg-c-lite-green {
      background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
      background: linear-gradient(to right, #ee5a6f, #f29263)
  }

  .user-profile {
      padding: 20px 0
  }

  .card-block {
      padding: 1.25rem
  }

  .m-b-25 {
      margin-bottom: 25px
  }

  .img-radius {
      border-radius: 5px
  }

  h6 {
      font-size: 14px
  }

  .card .card-block p {
      line-height: 25px
  }

  @media only screen and (min-width: 1400px) {
      p {
          font-size: 14px
      }
  }

  .card-block {
      padding: 1.25rem
  }

  .b-b-default {
      border-bottom: 1px solid #e0e0e0
  }

  .m-b-20 {
      margin-bottom: 20px
  }

  .p-b-5 {
      padding-bottom: 5px !important
  }

  .card .card-block p {
      line-height: 25px
  }

  .m-b-10 {
      margin-bottom: 10px
  }

  .text-muted {
      color: #919aa3 !important
  }

  .b-b-default {
      border-bottom: 1px solid #e0e0e0
  }

  .f-w-600 {
      font-weight: 600
  }

  .m-b-20 {
      margin-bottom: 20px
  }

  .m-t-40 {
      margin-top: 20px
  }

  .p-b-5 {
      padding-bottom: 5px !important
  }

  .m-b-10 {
      margin-bottom: 10px
  }

  .m-t-40 {
      margin-top: 20px
  }

  .user-card-full .social-link li {
      display: inline-block
  }

  .user-card-full .social-link li a {
      font-size: 20px;
      margin: 0 10px 0 0;
      -webkit-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out
  }
</style>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-12 col-md-16">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="D:\image\for_web\user.jpg" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600">{{$EduCenters->name}} </h6>
                                <p>EDU CENTER </p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Personal data</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600"> name:</p>
                                        <h6 class="text-muted f-w-400">{{$EduCenters->name}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Head name:</p>
                                        <h6 class="text-muted f-w-400">{{$EduCenters->head_name}}</h6>
                                    </div>
                                </div>

                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Contact information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email:</p>
                                        <h6 class="text-muted f-w-400">{{$EduCenters->email}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600"> Tell number :</p>
                                        <h6 class="text-muted f-w-400">{{$EduCenters->tell_number}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">  Edu senter web site :</p>
                                        <h6 class="text-muted f-w-400">{{$EduCenters->center_site}}</h6>
                                    </div>
                                </div>

                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Territorial data</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Region :</p>
                                        <h6 class="text-muted f-w-400">{{$EduCenters->region->name_en}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">City :</p>
                                        <h6 class="text-muted f-w-400">{{$EduCenters->city->name_en}}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Address:</p>
                                        <h6 class="text-muted f-w-400">{{$EduCenters->address}}</h6>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
        
        
        
        
       
       
        
        
   




@endsection 