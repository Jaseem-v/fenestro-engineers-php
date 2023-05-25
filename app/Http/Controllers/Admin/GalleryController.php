<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
use File;
//use Carbon\Carbon;
class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->menu=2;
    }

    public function index()
    {
        $data['menu']=$this->menu;
        $data['pageTitle']='Gallery';
        return view('admin.gallery.edit',$data);
    }
    public function image_uploads(Request $request)
    {
        $image = $request->file('file');
        $imageName ='gal_'.time() . '.' . $image->extension();
        $image->move(public_path('uploads'), $imageName);
        DB::table('gallery')->insert(array('image'=>$imageName));
        return response()->json(['success' => $imageName]);
    }
    public function images_fetch()
    {
        //$images = \File::allFiles(public_path('uploads'));
        $images=DB::table('gallery')->orderBy('id','DESC')->get();
        $output = '<div class="row">';
        foreach($images as $image)
        {
            $output .= '
      <div class="col-md-2" style="margin-bottom:16px;" align="center">
                <img src="'.asset('uploads/' . $image->image).'" class="img-thumbnail" width="175" height="175" style="height:175px;" /><br/><br/>
                <button data-id="'.$image->id.'" id="removeImage" type="button" class="btn btn-icon btn-danger btn-sm removeImage"><i class="fa fa-trash"></i></button>
            </div>
      ';
        }
        $output .= '</div>';
        echo $output;
    }
    public function image_delete($id)
    {

        $gallery=DB::table('gallery')->where('id',$id)->first();
        if($gallery) {
            if(file_exists(public_path('uploads/' . $gallery->image))) {
                \File::delete(public_path('uploads/' . $gallery->image));
            }
            DB::table('gallery')->where('id', $gallery->id)->delete();
        }

    }




}
