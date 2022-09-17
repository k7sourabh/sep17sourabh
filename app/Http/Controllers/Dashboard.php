<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;


class Dashboard extends Controller
{
    //for the login page
    function index(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('Login');
    }

    //for the dashboard Page
    function Dashboard_view(){
        $student_check = User::with('subject')->where(['status'=>1]);
        if($student_check){
            $this->data['student_data'] = $student_check->get();
        }
        return view('Dashboard',$this->data);
    }

    //login credential check
    function Login(request $request){

        if(!empty($request->all())){
            $request->validate([
                'email'=>'required',
                'password'=>'required',
            ]);
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard')->with('success','You have Successfully logged in');
            }
            return redirect()->back()->with('error','Oppes! You have entered invalid credentials');

        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

    //for the student add view 
    function Student_view(){
        return view('Student_add');
    }


    //Student Add
    function Student_Add(request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
        ]);

        $post_data = $request->all();

        unset($post_data['_token']);
        //for Student Add
        $Student = new User;
        $Student->name = $post_data['name'];
        $Student->students = 'student';
        $Student->email = $post_data['email'];
        $Student->phone = $post_data['phone'];
        $Student->address = $post_data['address'];
        $Student->city = $post_data['city'];
        $Student->state = $post_data['state'];
        $Student->country = $post_data['country'];
        $Student->status = 1;
        $Student->save();
        
        //for the subject add
        foreach ($request->sub_name as $key => $value) {
            $subject[$key] = new Subject;
            $subject[$key]->name = $post_data['sub_name'][$key];
            $subject[$key]->user_id = $Student->id;
            $subject[$key]->marks_scored = $post_data['marks_scored'][$key];
            $subject[$key]->grade = $post_data['grade'][$key];
            $subject[$key]->save();
        }
        return redirect()->route('dashboard')->with('success','Student Data Added Successfully');
    }


    function Student_delete(){
        $status = ['status'=>0];
        if(isset($_GET['st_id']) && !empty($_GET['st_id'])){
            $data_check = User::find($_GET['st_id']);
            if($data_check->count() > 0 ){
                $data_check->delete();
                $status = ['status'=>1];
            }
        }
        echo json_encode($status);
    }
}
