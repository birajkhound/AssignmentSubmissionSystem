<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\models\StuRegModel;
use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileControlController extends Controller
{
    //
    public function dex($id)
    {
        $student = StuRegModel::find($id);
        if (is_null($student)) {
            return redirect('dashboard');
        } else {
            $data = array();
            $data1 = array();
            $data = StuRegModel::where('id', "=", $id)->first();
            $data1 = department::where('d_id', "=", $data->d_id)->first();
            $data2 = DB::table('department')->orderBy('d_name', 'asc')->get();
            return view('profileupdate', compact('data', 'data1', 'data2'));
        }
    }
    public function makeChange($id, Request $request)
    {
        $students = StuRegModel::find($id);
        $students->name = $request->input('user_name');
        $students->email = $request->input('user_email');
        $students->roll_no = $request->input('user_roll_no');
        $students->d_id = $request->input('department');
        $students->semester = $request->input('semester');
        $students->gender = $request->input('gender');
        $students->Address = $request->input('address');
        $students->dob = $request->input('dateofbirth');
        $students->save();
        return redirect(route('updatedetails', ['id' => $id]))->with('status1', "Your Details Updated Successfully");
    }
    public function changePass($id, Request $request)
    {
        $data = StuRegModel::where('id', "=", $id)->first();
        $data1 = department::where('d_id', "=", $data->d_id)->first();
        $data2 = DB::table('department')->orderBy('d_name', 'asc')->get();
        return view('changePass', compact('data', 'data1', 'data2'));
    }

    public function changePassAction($id, Request $request)
    {
        $request->validate([
            'newpassword' => 'required|min: 3',
            'oldpassword' => 'required',
            'confirmpassword'  => 'required|same:newpassword',
        ]);

        $usr = StuRegModel::where([['id', "=", $id],])->first();
        if ($usr) {
            if (Hash::check($request->oldpassword, $usr->password)) {
                $students = StuRegModel::find($id);
                $students->password = Hash::make($request->input('newpassword'));
                $students->save();
                return redirect(route('changePass', ['id' => $id]))->with('status', "Your Password Has Been Changed Successfully");
            } else {
                return redirect(route('changePass', ['id' => $id]))->with('pass', "Your Old Password Is Not Correct");
            }
        } else {
            return redirect('/');
        }
    }
}
