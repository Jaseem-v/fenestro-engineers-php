<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;use DB;

use Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->menu=100;
    }


    public function index()
    {
        $data['menu'] = $this->menu;
        $data['pageTitle'] = "Settings";
        $data['result'] = DB::table('users')->where('id',Auth::user()->id)->first();
        return view('admin.profile.edit',$data);
    }

public function change_email(Request $request)
{
$email_count=DB::table('users')->where('email',$request->email)->where('id', '!=' , Auth::user()->id)->count();
if(!($email_count))
{
DB::table('users')->where('id',Auth::user()->id)->update(array('email'=>$request->email));
return redirect()->route('admin.profile')->with("edit_msg", "<div class='alert alert-success'>Email Successfully Updated!</div>");
}
else
{
return redirect()->route('admin.profile')->with("edit_msg", "<div class='alert alert-danger'>'".$request->email."' - Email already exists</div>");;
}


}

    public function change_password(Request $request)
    {
        $user = DB::table('users')->where('id',Auth::user()->id)->first();
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('admin.profile')->with("edit_msg", "<div class='alert alert-danger'>Your current password is incorrect</div>");;

        }
        else if(!($request->c_password==$request->new_password))
        {
            return redirect()->route('admin.profile')->with("edit_msg", "<div class='alert alert-danger'>Confirm password do not match</div>");;

        }
        DB::table('users')->where('id',Auth::user()->id)->update(array("password" =>Hash::make($request->c_password)));
        Auth::logout();
        return redirect()->route('login')->with("success", "<div class='alert alert-success'>Password Successfully Updated!</div>");
    }






}
