<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
use File;
use Carbon\Carbon;
class ProductsCategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->menu=44;
    }
    function friendly_seo_string($vp_string){
        $vp_string = trim($vp_string);
        $vp_string = html_entity_decode($vp_string);
        $vp_string = strip_tags($vp_string);
        $vp_string = strtolower($vp_string);
        $vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);
        $vp_string = preg_replace('~ ~', '-', $vp_string);
        $vp_string = preg_replace('~-+~', '-', $vp_string);
        $blog=DB::table('prod_categories')->where('seo_url',$vp_string)->first();
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
        $data['sub_menu']=$this->menu.'S1';
        $data['pageTitle']='Product Categories';
        $prod_categories=DB::table('prod_categories')
            ->orderBy('id','DESC')->paginate(50);
        $data['result']=$prod_categories;
        return view('admin.products_categories.view',$data);
    }
    public function create()
    {
        $data['menu']=$this->menu;
        $data['sub_menu']=$this->menu.'S1';
        $data['pageTitle']='Add Product Categories';
        $data['result']=[];
        return view('admin.products_categories.add',$data);
    }
    public function save(Request $request)
    {
        $image = Image::make($request->image);
        $image_name = 'pc_'.uniqid() . Auth::user()->id . time();

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
            'title'=>$request->title,
            'seo_url'=>$this->friendly_seo_string($request->title),
            'file'=>$image_name,
        );
        DB::table('prod_categories')->insert($data);
        return redirect()->route('admin.prod_categories')->with("view_msg", "<div class='alert alert-success'>Successfully Created</div>");

    }
    public function editShow($id)
    {
        $prod_categories=DB::table('prod_categories')
            ->where('id',$id)
            ->first();
        if($prod_categories) {
            $data['menu']=$this->menu;
            $data['sub_menu']=$this->menu.'S1';
            $data['pageTitle']='Edit Product Categorie';
            $data['result']=$prod_categories;
            return view('admin.products_categories.edit',$data);
        }
        else{
            return redirect()->route('admin.prod_categories');
        }
    }
    public function editSave(Request $request,$id)
    {
        $prod_categories=DB::table('prod_categories')
            ->where('id',$id)
            ->first();

        $save_data=array();

        if($request->hasFile('image')) {

            $file_path = 'uploads';
            if (file_exists(public_path($file_path . '/' . $prod_categories->file . '.webp'))) {
                File::delete(public_path($file_path . '/' . $prod_categories->file . '.webp'));
            }
//            if (file_exists(public_path($file_path . '/slider_300_' . $prod_categories->file . '.webp'))) {
//                File::delete(public_path($file_path . '/slider_300_' . $prod_categories->file . '.webp'));
//            }


            $image = Image::make($request->image);
            $image_name = 'pc_'.uniqid() . Auth::user()->id . time();

            //$image->resize(700, 290)->encode('webp');
            $image->save('uploads/' . $image_name . '.webp');

//            $image->resize(300, 300)->encode('webp');
//            $image->save('uploads/slider_300_' . $image_name . '.webp');
//
//        $image->resize(175, 73)->encode('png');
//        $image->save('uploads/blog_175x73_' . $image_name . '.png');

            $save_data['file']=$image_name;
        }


        if($prod_categories) {
            $save_data['title']=$request->title;
            DB::table('prod_categories')->where('id',$prod_categories->id)->update($save_data);
            return redirect()->route('admin.prod_categories')->with("view_msg", "<div class='alert alert-success'>Successfully Created</div>");

        }
        else{
            return redirect()->route('admin.prod_categories');
        }
    }

    public function delete($id)
    {
        $prod_categories=DB::table('prod_categories')->where('id',$id)->first();
        if($prod_categories) {
            $file_path = 'uploads';
            if (file_exists(public_path($file_path . '/' . $prod_categories->file . '.webp'))) {
                File::delete(public_path($file_path . '/' . $prod_categories->file . '.webp'));
            }

//            if (file_exists(public_path($file_path . '/slider_300_' . $prod_categories->file . '.webp'))) {
//                File::delete(public_path($file_path . '/slider_300_' . $prod_categories->file . '.webp'));
//            }

//            if (file_exists(public_path($file_path . '/blog_160x160_' . $prod_categories->file . '.png'))) {
//                File::delete(public_path($file_path . '/blog_160x160_' . $prod_categories->file . '.png'));
//            }

            DB::table('prod_categories')
                ->where('id', $prod_categories->id)->delete();
            return redirect()->route('admin.prod_categories')->with("view_msg", "<div class='alert alert-success'>Successfully Deleted</div>");
            // }

        }
        else
        {
            return redirect()->route('admin.prod_categories');
        }
    }


}
