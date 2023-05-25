<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
use File;
use Carbon\Carbon;
class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->menu=1;
    }

    function friendly_seo_string($vp_string){
        $vp_string = trim($vp_string);
        $vp_string = html_entity_decode($vp_string);
        $vp_string = strip_tags($vp_string);
        $vp_string = strtolower($vp_string);
        $vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);
        $vp_string = preg_replace('~ ~', '-', $vp_string);
        $vp_string = preg_replace('~-+~', '-', $vp_string);
        $blog=DB::table('blog')->where('seo_url',$vp_string)->first();
        if($blog)
        {
            return $vp_string.'-'.uniqid();
        }
        else
        {
            return $vp_string;
        }
    }


    public function index()
    {
        $data['menu']=$this->menu;
        $data['pageTitle']='Blog';
        $blog=DB::table('blog')
            ->orderBy('id','DESC')->paginate(50);
        $data['result']=$blog;
        return view('admin.blog.view',$data);
    }
    public function create()
    {
        $data['menu']=$this->menu;
        $data['pageTitle']='Add Blog';
        $data['result']=[];
        return view('admin.blog.add',$data);
    }
    public function save(Request $request)
    {


        $image = Image::make($request->image);
        $image_name = uniqid() . Auth::user()->id . time();

        //$image->resize(700, 290)->encode('webp');
        $image->save('uploads/blog_' . $image_name . '.webp');

        $image->resize(300, 300)->encode('webp');
        $image->save('uploads/blog_300_' . $image_name . '.webp');
//
//        $image->resize(175, 73)->encode('png');
//        $image->save('uploads/blog_175x73_' . $image_name . '.png');


        $data=array
        (
            'title'=>$request->title,
            'seo_url'=>$this->friendly_seo_string($request->title),
            'description'=>$request->description,
            'file'=>$image_name,
            'status'=>1,
            'created_at'=> now(),
            'updated_at'=> now(),
        );
        DB::table('blog')->insert($data);
        return redirect()->route('admin.blog')->with("view_msg", "<div class='alert alert-success'>Successfully Created</div>");

    }
    public function editShow($id)
    {
        $blog=DB::table('blog')
            ->where('id',$id)
            ->first();
        if($blog) {
            $data['menu']=$this->menu;
            $data['pageTitle']='Edit Blog';
            $data['result']=$blog;
            return view('admin.blog.edit',$data);
        }
        else{
            return redirect()->route('admin.blog');
        }
    }
    public function editSave(Request $request,$id)
    {
        $blog=DB::table('blog')
            ->where('id',$id)
            ->first();

        $save_data=array();

        if($request->hasFile('image')) {


            $file_path = 'uploads';
            if (file_exists(public_path($file_path . '/blog_' . $blog->file . '.webp'))) {
                File::delete(public_path($file_path . '/blog_' . $blog->file . '.webp'));
            }

            if (file_exists(public_path($file_path . '/blog_300_' . $blog->file . '.webp'))) {
                File::delete(public_path($file_path . '/blog_300_' . $blog->file . '.webp'));
            }


            $image = Image::make($request->image);
            $image_name = uniqid() . Auth::user()->id . time();

            //$image->resize(700, 290)->encode('webp');
            $image->save('uploads/blog_' . $image_name . '.webp');

            $image->resize(300, 300)->encode('webp');
            $image->save('uploads/blog_300_' . $image_name . '.webp');
//
//        $image->resize(175, 73)->encode('png');
//        $image->save('uploads/blog_175x73_' . $image_name . '.png');

            $save_data['file']=$image_name;
        }







        if($blog) {


            $save_data['title']=$request->title;
            $save_data['title']=$request->title;
            $save_data['description']=$request->description;
            $save_data['status']=$request->status;
            $save_data['updated_at']=$request->updated_at;

            DB::table('blog')->where('id',$blog->id)->update($save_data);
            return redirect()->route('admin.blog')->with("view_msg", "<div class='alert alert-success'>Successfully Created</div>");

        }
        else{
            return redirect()->route('admin.blog');
        }
    }

    public function delete($id)
    {
        $blog=DB::table('blog')->where('id',$id)->first();
        if($blog) {



            $file_path = 'uploads';
            if (file_exists(public_path($file_path . '/blog_' . $blog->file . '.webp'))) {
                File::delete(public_path($file_path . '/blog_' . $blog->file . '.webp'));
            }

            if (file_exists(public_path($file_path . '/blog_300_' . $blog->file . '.webp'))) {
                File::delete(public_path($file_path . '/blog_300_' . $blog->file . '.webp'));
            }

//            if (file_exists(public_path($file_path . '/blog_160x160_' . $blog->file . '.png'))) {
//                File::delete(public_path($file_path . '/blog_160x160_' . $blog->file . '.png'));
//            }

            DB::table('blog')
                ->where('id', $blog->id)->delete();
            return redirect()->route('admin.blog')->with("view_msg", "<div class='alert alert-success'>Successfully Deleted</div>");
            // }

        }
        else
        {
            return redirect()->route('admin.blog');
        }
    }


}
