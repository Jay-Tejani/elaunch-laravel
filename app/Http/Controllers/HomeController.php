<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use DataTables;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $candidates = employee::all();
        return view('home',['candidates' => $candidates]);
    }

    public function getEmployees(Request $request)
    {
        
        // if($request->ajax() == 1)
        {
            $data = Employee::latest()->get();  
         
            return DataTables::of($data)->addIndexColumn()->addColumn('action',function($row)
            {
                $actionBtn = '<a href="'. url("/update/{$row->id}") .'" class="edit btn btn-success btn-sm">Edit</a> <a href="'. url("/delete/{$row->id}") .'" class="delete btn btn-danger btn-sm">Delete</a>';
                
                return $actionBtn;
            })->rawColumns(['action'])->make(true);
        }
    }
    public function getDesigation()
    {
        return DB::table('designations')->get();
      
    }
    public function getdepartment()
    {
        return DB::table('departments')->get();
      
    }
    public function create()
    {
       
        
        return view('employee',['designation' => $this->getDesigation(),'departments' => $this->getdepartment()]);
    }

   

    public function insert(Request $request)
    {
        $this->validate($request, [ 
			'first_name' => 'required', 
			'last_name' => 'required', 
			'birth_date' => 'required', 
			'mobile_no' => 'required', 
			'email' => 'required', 
			'password' => 'required', 
			'salary' => 'required', 
			'joining_date' => 'required', 
			'passport_number' => 'required', 
			'gender' => 'required',  
		]);
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $birth_date = $request->input('birth_date');
        $mobile_no = $request->input('mobile_no');
        $email = $request->input('email');
        $password = $request->input('password');
        $salary = $request->input('salary');
        $joining_date = $request->input('joining_date');
        $image = $request->input('image');
        $passport_number = $request->input('passport_number');
        $gender = $request->input('gender');
        $designation_id = $request->input('designation_id');
        $department_id = $request->input('department_id');

        DB::table('employees')->insert([
            ['first_name' => $first_name, 'last_name' => $last_name, 'birth_date' => $birth_date, 'mobile_no' => $mobile_no, 'email' => $email, 'password' => $password, 'salary' => $salary, 'joining_date' => $joining_date, 'image' => $image, 'passport_number' => $passport_number, 'gender' => $gender,'designation_id' => $designation_id,'department_id' => $department_id]
            
        ]);
        return redirect('/home')-> with('info','inserted');
    }

    public function update($id)

    {
        // print_r($id);
        // die;
      $employee = Employee::find($id);
    //   echo "<pre>";
    //   print_r($employee);
    //     die;
        return view('update',['employee' => $employee,'designation' => $this->getDesigation(),'departments' => $this->getdepartment()]);

    }

    public function edit(request $request, $id)

    {
        $this->validate($request, [ 
			'first_name' => 'required', 
			'last_name' => 'required', 
			'birth_date' => 'required', 
			'mobile_no' => 'required', 
			'email' => 'required', 
			'password' => 'required', 
			'salary' => 'required', 
			'joining_date' => 'required', 
			'passport_number' => 'required', 
			'gender' => 'required',  
		]);
        $employee = Employee::find($id);

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $birth_date = $request->input('birth_date');
        $mobile_no = $request->input('mobile_no');
        $email = $request->input('email');
        $password = $request->input('password');
        $salary = $request->input('salary');
        $joining_date = $request->input('joining_date');
        $image = $request->input('image');
        $passport_number = $request->input('passport_number');
        $gender = $request->input('gender');
        $designation_id = $request->input('designation_id');
        $department_id = $request->input('department_id');
        

        DB::table('employees')
        ->where('id', $id)  
        ->update(array('first_name' => $first_name, 'last_name' => $last_name, 'birth_date' => $birth_date, 'mobile_no' => $mobile_no, 'email' => $email, 'password' => $password, 'salary' => $salary, 'joining_date' => $joining_date, 'image' => $image, 'passport_number' => $passport_number, 'gender' => $gender,'designation_id' => $designation_id,'department_id' => $department_id));   

        
       return redirect('/home')-> with('info','Updated'); 


        

    }

    public function delete($id)

    {
        Employee:: where('id',$id)
        ->delete();
        return redirect('/register')-> with('info','Deleted'); 

    }

}
