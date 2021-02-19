<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EduCenter;
use App\User;
use App\Student;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Regions ;
use App\Cities;

class EduCenterController extends Controller
{

    public function index()
    {
        
        $isAuth = auth()->check();
        if($isAuth) {
            $students = Student::where('center_id', auth()->user()->edu_center_id)->get();
            return view('roles.eduCenter')->with('students', $students );
        }   else {
            return redirect('login');
        }
    }

    public function adminpanel(Request $request) 
    {
        // deyarli togri faqat kichik xato bor;
        $query  = EduCenter::query();
       
        
        if(isset($request->name) && !empty($request->name))
        {
            $query = $query->where('name', 'like', '%' . $request->name . '%' );  
        } 

        if(isset($request->id) && !empty($request->id)) 
        {
            $query = $query->where('id', '=', $request->id);
        } 

        if(isset($request->email) && !empty($request->email)) 
        {
            $query = $query->where('email', 'LIKE', '%' . $request->email . '%');
        }

        if(isset($request->address) && !empty($request->address)) 
        {
            $query = $query->where('address', 'LIKE', '%' . $request->address . '%');
        }

        if(isset($request->tell_number) && !empty($request->tell_number)) 
        {
            $query = $query->where('tell_number', 'LIKE', '%' . $request->tell_number . '%');
        } 

        if(isset($request->web_site) && !empty($request->web_site)) 
        {
            $query = EduCenter::where('center_site', 'LIKE', '%' . $request->web_site . '%' );
        } 
        if(isset($request->about) && !empty($request->about)) 
        {
            $query = $query->where('center_about', 'LIKE', '%' . $request->about . '%');
        }

        $edu_centers = $query->paginate(5);

        return view('roles.adminPanel', ['eduCenters' => $edu_centers ]);
    }

    public function createCenter()
    {
        $region_list=DB::table('regions')
                    ->get();
        return view('centers.createCenter')->with('region_list',$region_list);
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data =DB::table('cities')
                ->where('region_id', $value)
                ->get();
            
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
            $output .=( '<option value="'.$row->id.'">'. $row->name_uz .'</option>');
        }
        echo $output;

    }

    public function show($id)
    {
        $EduCenters = EduCenter::find($id);
        $region = Regions::where('id', $EduCenters->region_id)->first(); 
        $city = Cities::where('id' , $EduCenters->city_id)->first();
        $EduCenters->region;
        $EduCenters->city;
        return view('centers.showCenter', ['EduCenters' => $EduCenters, 'region' => $region ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'head_name' =>'required',
            'email' => 'required',
            'address' => 'required',
            'tell_number' => 'required',
            'center_site' => 'required',
            'center_about' => 'required',
            'user_name' => 'required',
            'login' => 'required',
            'password' =>'required'
        ]);
       
        $eduCenter = EduCenter::create([ 
            'region_id'=>$request->region_id,
            'city_id'=>$request->city_id,
            'name' => $request->name, 
            'head_name'=>$request->head_name, 
            'email' => $request->email,  
            'address' => $request->address, 
            'tell_number' => $request->tell_number,
            'center_site' => $request->center_site,
            'center_about' => $request->center_about
        ]);

    
       
        $user = DB::table('users')->insert([
            'role_id' => 2,
            'edu_center_id' => $eduCenter->id, 
            'name' => $request->user_name,
            'login' => $request->login,
            'password' => bcrypt($request->password)
            
        ]);
        
        return redirect('/adminpanel');
       
    }

    public function edit($id)
    {
        $EduCenter = EduCenter::find($id);
        return view('centers.edit')->with('EduCenter', $EduCenter);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'tell_number' => 'required',
            'center_site' => 'required',
            'center_about' => 'required'
        ]);

        $data =$request->all();
        $EduCenter=EduCenter::find($id);
        $EduCenter -> update($data);
       
        return redirect('/adminpanel')->with('success','center updated');
    }
    
    public function destroy($id)
    {
        $EduCenter=EduCenter::find($id);
        $EduCenter -> delete();

        return redirect('/adminpanel')->with('success','center deleted');
    }

}
