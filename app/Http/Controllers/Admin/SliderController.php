<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
use File;
use Carbon\Carbon;
class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->menu=11;
    }

    public function index()
    {
        $data['menu']=$this->menu;
        $data['pageTitle']='Slider';
        $slider=DB::table('slider')
            ->orderBy('id','DESC')->paginate(50);
        $data['result']=$slider;
        return view('admin.slider.view',$data);
    }
    public function create()
    {
        $data['menu']=$this->menu;
        $data['pageTitle']='Add Slider';
        $data['result']=[];
        return view('admin.slider.add',$data);
    }
    public function save(Request $request)
    {
        $image = Image::make($request->image);
        $image_name = 'slider_'.uniqid() . Auth::user()->id . time();

        //$image->resize(700, 290)->encode('webp');
        $image->save('uploads/'.$image_name . '.webp');
//
//        $image->resize(300, 300)->encode('webp');
//        $image->save('uploads/slider_300_' . $image_name . '.webp');
//
//        $image->resize(175, 73)->encode('png');
//        $image->save('uploads/blog_175x73_' . $image_name . '.png');

        $data=array
        (
            'top_title'=>$request->top_title,
            'heading'=>$request->heading,
            "btn1Title" => $request->btn1Title,
            "btn1Url" => $request->btn1Url,
            "btn1Visible" => isset($request->btn1Visible)?1:0,
            'file'=>$image_name,
        );
        DB::table('slider')->insert($data);
        return redirect()->route('admin.slider')->with("view_msg", "<div class='alert alert-success'>Successfully Created</div>");

    }
    public function editShow($id)
    {
        $slider=DB::table('slider')
            ->where('id',$id)
            ->first();
        if($slider) {
            $data['menu']=$this->menu;
            $data['pageTitle']='Edit Slider';
            $data['result']=$slider;
            return view('admin.slider.edit',$data);
        }
        else{
            return redirect()->route('admin.slider');
        }
    }
    public function editSave(Request $request,$id)
    {
        $slider=DB::table('slider')
            ->where('id',$id)
            ->first();

        $save_data=array();

        if($request->hasFile('image')) {

            $file_path = 'uploads';
            if (file_exists(public_path($file_path . '/' . $slider->file . '.webp'))) {
                File::delete(public_path($file_path . '/' . $slider->file . '.webp'));
            }
//            if (file_exists(public_path($file_path . '/slider_300_' . $slider->file . '.webp'))) {
//                File::delete(public_path($file_path . '/slider_300_' . $slider->file . '.webp'));
//            }


            $image = Image::make($request->image);
            $image_name = 'slider_'.uniqid() . Auth::user()->id . time();

            //$image->resize(700, 290)->encode('webp');
            $image->save('uploads/' . $image_name . '.webp');

//            $image->resize(300, 300)->encode('webp');
//            $image->save('uploads/slider_300_' . $image_name . '.webp');
//
//        $image->resize(175, 73)->encode('png');
//        $image->save('uploads/blog_175x73_' . $image_name . '.png');

            $save_data['file']=$image_name;
        }


        if($slider) {
            $save_data['top_title']=$request->top_title;
            $save_data['heading']=$request->heading;
            $save_data['btn1Title']=$request->btn1Title;
            $save_data['btn1Url']=$request->btn1Url;
            $save_data['btn1Visible']=isset($request->btn1Visible)?1:0;
            DB::table('slider')->where('id',$slider->id)->update($save_data);
            return redirect()->route('admin.slider')->with("view_msg", "<div class='alert alert-success'>Successfully Created</div>");

        }
        else{
            return redirect()->route('admin.slider');
        }
    }

    public function delete($id)
    {
        $slider=DB::table('slider')->where('id',$id)->first();
        if($slider) {
            $file_path = 'uploads';
            if (file_exists(public_path($file_path . '/' . $slider->file . '.webp'))) {
                File::delete(public_path($file_path . '/' . $slider->file . '.webp'));
            }

//            if (file_exists(public_path($file_path . '/slider_300_' . $slider->file . '.webp'))) {
//                File::delete(public_path($file_path . '/slider_300_' . $slider->file . '.webp'));
//            }

//            if (file_exists(public_path($file_path . '/blog_160x160_' . $slider->file . '.png'))) {
//                File::delete(public_path($file_path . '/blog_160x160_' . $slider->file . '.png'));
//            }

            DB::table('slider')
                ->where('id', $slider->id)->delete();
            return redirect()->route('admin.slider')->with("view_msg", "<div class='alert alert-success'>Successfully Deleted</div>");
            // }

        }
        else
        {
            return redirect()->route('admin.slider');
        }
    }


}
