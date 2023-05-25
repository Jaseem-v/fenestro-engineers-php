<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
use File;
//use Carbon\Carbon;
class TestimonialsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->menu=3;
    }
    public function index()
    {
        $data['menu']=$this->menu;
        $data['pageTitle']='Testimonials';
        $data['testimonials']=DB::table('testimonials')->orderBy('id','DESC')->get();
        return view('admin.testimonials.view_edit',$data);
    }
    public function add_testimonial_post(Request $request)
    {
        $image = $request->file('image');
        $imageName ='testi_'.time() . '.' . $image->extension();
        $image->move(public_path('uploads'), $imageName);
        DB::table('testimonials')->insert(array(
            'image'=>$imageName,
            'description'=>$request->description,
            'fname'=>$request->fname,
            'place'=>$request->place,
            ));
        return redirect()->route('admin.testimonials')->with("view_msg2", "<div class='alert alert-success'>Successfully Created</div>");
    }
    public function testimonial_delete($id)
    {
        $testimonials=DB::table('testimonials')->where('id',$id)->first();
        if($testimonials) {
            if (file_exists(public_path('uploads/' . $testimonials->image))) {
                File::delete(public_path( 'uploads/' . $testimonials->image));
            }
            DB::table('testimonials')->where('id', $testimonials->id)->delete();
            return redirect()->route('admin.testimonials')->with("view_msg2", "<div class='alert alert-success'>Successfully Deleted</div>");
        }
        else
        {
            return redirect()->route('admin.testimonials');
        }
    }
public function testimonial_status($id)
{
    $testimonials=DB::table('testimonials')->where('id',$id)->first();
    if($testimonials) {
      DB::table('testimonials')->where('id', $testimonials->id)->update(array('status'=>($testimonials->status=='1'?0:1)));
        return response()->json(array(
            'status'=>($testimonials->status=='1'?0:1)
        ));

    }
    else
    {
        return response()->json(array(
            'status'=>0
        ));
    }
}
}
