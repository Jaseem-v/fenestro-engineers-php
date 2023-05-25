<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
use File;
use Carbon\Carbon;
class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->menu=4;
    }
    public function show()
    {
        $data['menu']=$this->menu;
        $data['pageTitle']='Settings';
        $data['result']=DB::table('settings')->first();
        return view('admin.settings.edit',$data);
    }
    public function update(Request $request)
    {

        $data=array(
            "phone" => $request->phone,
            "email" => $request->email,
            "address" => $request->address,
            "facebook" => $request->facebook,
            "instagram" => $request->instagram,
            "youtube" => $request->youtube,
            "twitter" => $request->twitter,
            "linkedin" => $request->linkedin,
        );


        $settings=DB::table('settings')->first();
        if($settings) {

            if($request->hasFile('image')) {

                if (file_exists(public_path( 'uploads/'.$settings->logo))) {
                    File::delete(public_path( 'uploads/'.$settings->logo));
                }
                $image1 = $request->file('image');
                $imageName1 ='logo_'.time() . '.' . $image1->extension();
                $image1->move(public_path('uploads'), $imageName1);
                $data['logo']=$imageName1;
            }

            DB::table('settings')->where('id',$settings->id)->update($data);
        }
        else
        {
            DB::table('settings')->insert($data);

        }
        return redirect()->route('admin.settings')->with("view_msg", "<div class='alert alert-success'>Successfully Updated</div>");
    }

}
