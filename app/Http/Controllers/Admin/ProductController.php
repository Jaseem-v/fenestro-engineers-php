<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
use File;
use Carbon\Carbon;
class ProductController extends Controller
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
        $blog=DB::table('products')->where('seo_url',$vp_string)->first();
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
        $data['sub_menu']=$this->menu.'S2';
        $data['pageTitle']='Products';
        $products=DB::table('products')
            ->orderBy('id','DESC')->paginate(50);
        $data['result']=$products;
        return view('admin.products.view',$data);
    }
    public function create()
    {
        $data['menu']=$this->menu;
        $data['sub_menu']=$this->menu.'S2';
        $data['pageTitle']='Add Product';
        $data['prod_categories']=DB::table('prod_categories')->get();;
        return view('admin.products.add',$data);
    }
    public function save(Request $request)
    {
        $data=array
        (
            'prod_cat_id'=>$request->prod_cat,
            'product_name'=>$request->product_name,
            'seo_url'=>$this->friendly_seo_string($request->product_name),
        );
        $product_id=DB::table('products')->insertGetId($data);
        return redirect()->route('admin.products.editShow',[$product_id])->with("edit_msg", "<div class='alert alert-success'>Successfully Created</div>");
    }
    public function editShow($id)
    {
        $products=DB::table('products')
            ->where('id',$id)
            ->first();
        if($products) {
            $data['menu']=$this->menu;
            $data['sub_menu']=$this->menu.'S2';
            $data['pageTitle']='Edit Product';
            $data['prod_categories']=DB::table('prod_categories')->get();;
            $data['result']=$products;
            return view('admin.products.edit',$data);
        }
        else{
            return redirect()->route('admin.products');
        }
    }
    public function editSave(Request $request,$id)
    {
        $products=DB::table('products')
            ->where('id',$id)
            ->first();
        if($products) {


            $color_json=array();
            foreach ($request->color_name as $index=>$color_name)
            {
                if(!($color_name=='')) {
                    $color_json[] = array(
                        "color_name" => $color_name,
                        "color_value" => $request->color_value[$index],
                    );
                }
            }
            $data["color_json"]=json_encode($color_json);


            $features_json=array();
            foreach ($request->features as $index2=>$features)
            {
                if(!($features=='')) {
                    $features_json[] = array(
                        "features" => $features,
                        "feat_value" => $request->feat_value[$index2],
                    );
                }
            }
            $data["features_json"]=json_encode($features_json);
            $data["product_name"]=$request->product_name;
            $data["description"]=$request->description;
            $data["prod_cat_id"]=$request->prod_cat;
            DB::table('products')->where('id',$products->id)->update($data);
            return redirect()->route('admin.products.editShow',[$products->id])->with("edit_msg", "<div class='alert alert-success'>Successfully Updated</div>");

        }
        else{
            return redirect()->route('admin.products');
        }
    }

    public function delete($id)
    {
        $products=DB::table('products')->where('id',$id)->first();
        if($products) {
            $product_images=DB::table('product_images')->where('product_id',$products->id)->get();
            foreach($product_images as $product_image_item){
                if(file_exists(public_path('uploads/' . $product_image_item->image))) {
                    \File::delete(public_path('uploads/' . $product_image_item->image));
                }
                DB::table('product_images')->where('id', $product_image_item->id)->delete();
            }

            DB::table('products')
                ->where('id', $products->id)->delete();
            return redirect()->route('admin.products')->with("view_msg", "<div class='alert alert-success'>Successfully Deleted</div>");

        }
        else
        {
            return redirect()->route('admin.products');
        }
    }


    public function image_uploads(Request $request,$product_id=null)
    {
        $image = $request->file('file');
        $imageName ='prod_'.time() . '.' . $image->extension();
        $image->move(public_path('uploads'), $imageName);
        DB::table('product_images')->insert(array('product_id'=>$product_id,'image'=>$imageName));
        return response()->json(['success' => $imageName]);
    }
    public function images_fetch($product_id=null)
    {
        //$images = \File::allFiles(public_path('uploads'));
        $images=DB::table('product_images')->where('product_id',$product_id)->orderBy('id','DESC')->get();
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
        $product_images=DB::table('product_images')->where('id',$id)->first();
        if($product_images) {
            if(file_exists(public_path('uploads/' . $product_images->image))) {
                \File::delete(public_path('uploads/' . $product_images->image));
            }
            DB::table('product_images')->where('id', $product_images->id)->delete();
        }

    }



}
