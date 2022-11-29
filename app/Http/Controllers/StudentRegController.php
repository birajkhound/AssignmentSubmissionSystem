<?php

namespace App\Http\Controllers;

use App\models\StuRegModel;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StudentRegController extends Controller
{
    public function index()
    {
        return view('studentlogin');
    }
    public function studentreg(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|regex:/^[a-zA-Z\s]*$/',
                'email' => 'required|unique:students,email',
                'rollno' => 'required|unique:students,roll_no',
                'password' => 'required|min:3',
                'confirmpassword' => 'required|same:password',

            ]
        );
        $students = new StuRegModel();
        $students->name = $request->input('name');
        $students->email = $request->input('email');
        $students->roll_no = $request->input('rollno');
        $students->depatment = $request->input('department');
        $students->semester = $request->input('class');
        $students->gender = $request->input('gender');
        $students->password = Hash::make($request->input('password'));
        $students->dob = $request->input('dob');
        $students->save();
        return redirect('/')->with('status', "Account Created Successfully.");
    }
    public function login(Request $request)
    {
        $request->validate([
            'Email' => 'required',
            'Password' => 'required',
        ]);

        $usr = StuRegModel::where([
            ['email', "=", $request->Email],
        ])->first();
        if ($usr) {
            if (Hash::check($request->Password, $usr->password)) {
                $request->session()->put('loginId', $usr->id);
                return redirect('dashboard');
            } else {
                return redirect('/')->with('pass', "You Have Entered Wrong Password");
            }
        } else {
            return redirect('/')->with('mail', "You Have Entered Wrong Email");
        }
    }
    public function dashboard(){
        {
            $data = array();
            if (Session::has('loginId')) {
                $data = StuRegModel::where('id', "=", Session::get('loginId'))->first();
            }
            return view('dashboard', compact('data'));
        }
    }
    public function logout(){
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('/');
        }
    }
    
}
