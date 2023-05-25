<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
class WebController extends Controller
{

    public function aaa()
    {
        $start = '20:36:00';  //8.36 pm
        $end   = '22:38:00';  //10.38 pm
        $now = \Carbon\Carbon::now('Asia/Calcutta');
        if ($now->between($start, $end)) {

            echo "Active Slot";
        }
        else
        {
            echo "Time Expired";
        }
    }

    public function home()
    {
//        $data['pageTitle'] = "Settings";
//        $data['home_section_1'] = DB::table('home_section_1')->first();
//        $data['home_section_1_images'] = DB::table('home_section_1_images')->get();
//        $data['blog'] = DB::table('blog')->limit(3)->orderBy('id','DESC')->get();
        $data['gallery'] = DB::table('gallery')->limit(10)->orderBy('id','DESC')->get();
        $data['testimonials'] = DB::table('testimonials')
            ->where('status',1)
            ->limit(10)->orderBy('id','DESC')->get();
        $data['slider'] = DB::table('slider')->limit(12)->orderBy('id','DESC')->get();
        $data['blog'] = DB::table('blog')->limit(3)->orderBy('id','DESC')->get();
        $data['products'] = DB::table('products')->limit(8)->orderBy('id','DESC')->get();
        $data['prod_categories'] = DB::table('prod_categories')->limit(10)->orderBy('id','DESC')->get();
        return view('web.home',$data);
    }

    public function about(){
        return view('web.about');
    }
    public function bookDemo(){
        return view('web.bookDemo');
    }
    public function testimonial(){
        $data['testimonials'] = DB::table('testimonials')
            ->where('status',1)
            ->limit(100)->orderBy('id','DESC')->get();
        return view('web.testimonial',$data);
    }
    public function testimonial_post(Request $request)
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
        return redirect()->route('testimonial')->with("view_msg2", "<div class='alert alert-success'>Your Feedback Has Been Successfully Submitted.</div>");
    }
    public function products(){
        $data['products'] = DB::table('products')->limit(100)->orderBy('id','DESC')->get();
        return view('web.product',$data);
    }
    public function product_single($url=null){
        $data['product'] = DB::table('products')->where('seo_url',$url)->first();
        if($data['product']) {
            $data['product_images'] = DB::table('product_images')->where('product_id',$data['product']->id)->get();
            $data['color_json']=json_decode($data['product']->color_json?$data['product']->color_json:'[]');
            $data['features_json']=json_decode($data['product']->features_json?$data['product']->features_json:'[]');
            return view('web.product_single',$data);
        }
        else
        {
            abort(404);
        }
    }
    public function gallery(){
        $data['gallery'] = DB::table('gallery')->limit(100)->orderBy('id','DESC')->get();
        return view('web.gallery',$data);
    }
    public function blog(){
        $data['blog'] = DB::table('blog')->limit(100)->orderBy('id','DESC')->get();
        return view('web.blog',$data);
    }
    public function blog_single($url=null){
        $data['recent_blogs'] = DB::table('blog')->limit(5)->orderBy('id','DESC')->get();
        $data['blog'] = DB::table('blog')->where('seo_url',$url)->first();
        if($data['blog']) {
         return view('web.blog_single',$data);
        }
        else
        {
            abort(404);
        }
    }
    public function contact(){
        return view('web.contact');
    }
    public function bookDemo_post(Request $request){
        $data=array(
            "fname" => $request->fname,
            "phone" => $request->phone,
            "email" => $request->email,
            "zipcode" => isset($request->zipcode)?$request->zipcode:'',
            "floorsize" => isset($request->floorsize)?$request->floorsize:'',
            "installationDate" => isset($request->installationDate)?$request->installationDate:'',
            "support" => $request->support,
            "product_name"=> isset($request->product_name)?$request->product_name:'',
            "product_link"=> isset($request->product_link)?url($request->product_link):''
        );

        $user = DB::table('users')->first();
        if($user) {
            $toName = $user->name;
            $toEmail = $user->email;
            //-------------------------------------------------------------
            $fromEmail = 'noreply@fenestroengineers.com';
            $fromName = 'Fenestro Engineers';
            $subject = (isset($request->product_name)?"Product Enquiry - ":"Book A Demo - ") . $data['fname'];
            \Mail::send((isset($request->product_name)?'mail.product-enquiry-template':'mail.book-demo-template'), $data, function ($message) use ($toEmail, $toName, $fromEmail, $fromName, $subject) {
                $message->from($fromEmail, $fromName);
                $message->to($toEmail, $toName);
                $message->subject($subject);
            });


            $toName2 = $data['fname'];
            $toEmail2 = $data['email'];
            $fromEmail2 = 'noreply@fenestroengineers.com';
            $fromName2 = 'Fenestro Engineers';
            $subject2 = "Thank You for Contacting Fenestro Engineers! - " . $data['fname'];
            \Mail::send('mail.user-thanks-form', $data, function ($message) use ($toEmail2, $toName2, $fromEmail2, $fromName2, $subject2) {
                $message->from($fromEmail2, $fromName2);
                $message->to($toEmail2, $toName2);
                $message->subject($subject2);
            });
            //-------------------------------------------------------------
            return redirect()->route('bookDemo')->with("book_msg", "<div class='alert alert-success'>Successfully Demo Booked</div>");        }
        else
        {
            return redirect()->route('bookDemo')->with("book_msg", "<div class='alert alert-danger'>Receiver email not updated.</div>");
        }


    }
    public function contact_post(Request $request){
       $data=array(
      "fname" => $request->fname,
      "phone" => $request->phone,
      "email" => $request->email,
      "message1" => $request->message,
       );

        $user = DB::table('users')->first();
        if($user) {
            $toName = $user->name;
            $toEmail = $user->email;
            //-------------------------------------------------------------
            $fromEmail = 'noreply@fenestroengineers.com';
            $fromName = 'Fenestro Engineers';
            $subject = "Contact Enquiry - " . $data['fname'];
            \Mail::send('mail.contact-enquiry', $data, function ($message) use ($toEmail, $toName, $fromEmail, $fromName, $subject) {
                $message->from($fromEmail, $fromName);
                $message->to($toEmail, $toName);
                $message->subject($subject);
            });


            $toName2 = $data['fname'];
            $toEmail2 = $data['email'];
            $fromEmail2 = 'noreply@fenestroengineers.com';
            $fromName2 = 'Fenestro Engineers';
            $subject2 = "Thank You for Contacting Fenestro Engineers! - " . $data['fname'];
            \Mail::send('mail.user-thanks-form', $data, function ($message) use ($toEmail2, $toName2, $fromEmail2, $fromName2, $subject2) {
                $message->from($fromEmail2, $fromName2);
                $message->to($toEmail2, $toName2);
                $message->subject($subject2);
            });
            //-------------------------------------------------------------
            return redirect()->route('contact')->with("contact_msg", "<div class='alert alert-success'>Your message has been sent successfully</div>");
        }
        else
        {
            return redirect()->route('contact')->with("contact_msg", "<div class='alert alert-danger'>Receiver email not updated.</div>");

        }

    }





}
