<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\EduCenter;
use App\User;
use App\Regions;
use App\Cities;
use DB;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    public function index()
    {
        $region_list=DB::table('regions')
                    ->get();
        $science_list=DB::table('sciences')
                    ->get();
        return view('students.createStudent', ['region_list' => $region_list, 'science_list' => $science_list ]); 
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

    public function showindex()
    {
        $user = auth()->user();
        $student = Student::where('id', $user->student_id)->first();
        $region = Regions::where('id', $student->region_id)->first(); 
        $city = Cities::where('id' , $student->city_id)->first();
        $student->region;
        $student->city;
        return view('students.showStudent', ['student' => $student, 'region' => $region ]);
    }
    
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'date_birth' => 'required',
            'TIN' => 'required',
            'email' => 'required',
            'address' => 'required',
            'tell_number' => 'required',
            'name' => 'required',
            'login' => 'required',
            'password' =>'required'
        ]);
    
        $user = auth()->user(); 
        $student = Student::create([ 
            'science_id'=>$request->science_id,
            'region_id'=>$request->region_id,
            'city_id'=>$request->city_id,
            'center_id' => $user->edu_center_id, 
            'first_name' => $request->first_name,  
            'last_name' => $request->last_name,  
            'date_birth' => $request->date_birth, 
            'TIN' => $request->TIN,
            'email' => $request->email,
            'address' => $request->address,
            'tell_number' => $request->tell_number

        ]);
        $user = auth()->user();
        User::create([ 
            'edu_center_id' => $user->edu_center_id, 
            'role_id' => 3,  
            'student_id' => $student->id, 
            'name' => $request->name,
            'login' => $request->login,
            'password' => bcrypt($request->password)
        ]);
        
        return redirect('/educenter');

    }

    public function show($id)
    {
        $student = Student::find($id);
        $region = Regions::where('id', $student->region_id)->first(); 
        $city = Cities::where('id' , $student->city_id)->first();
        $student->region;
        $student->city;
        
        return view('centers.showStudent', ['student' => $student, 'region' => $region ]);
    }

    public function edit($id)
    {
        $student = Student::find($id)->first();
        return view('students.edit')->with('student', $student);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'date_birth' => 'required',
            'TIN' => 'required',
            'email' => 'required',
            'address' => 'required',
            'tell_number' => 'required',
        ]);

        $data =$request->all();
        $student=Student::find($id);
        $student -> update($data);        
        return redirect('/educenter')->with('success','center updated');
    }

    public function destroy($id)
    {
        $student=Student::find($id);
        $student->delete();

        return redirect('/educenter')->with('success','center deleted');
    }



}
