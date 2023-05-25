<li {{isset($menu)?($menu==0?'class=active':''):''}}>
    <a href="{{route('admin.dashboard')}}"><i class="icon-home"></i><span>Dashboard</span></a>
</li>

<li {{isset($menu)?($menu==11?'class=active':''):''}}>
    <a href="{{route('admin.slider')}}"><i class="icon-globe"></i><span>Slider</span></a>
</li>


<li {{isset($menu)?($menu==1?'class=active':''):''}}>
    <a href="{{route('admin.blog')}}"><i class="icon-globe"></i><span>Blog</span></a>
</li>

<li {{isset($menu)?($menu==2?'class=active':''):''}}>
    <a href="{{route('admin.gallery')}}"><i class="icon-globe"></i><span>Gallery</span></a>
</li>
<li {{isset($menu)?($menu==3?'class=active':''):''}}>
    <a href="{{route('admin.testimonials')}}"><i class="icon-globe"></i><span>Testimonials</span></a>
</li>


<li {{isset($menu)?($menu==44?'class=active':''):''}}>
    <a href="#Blog" class="has-arrow"><i class="icon-home"></i><span>Product</span></a>
    <ul aria-expanded="{{isset($menu)?($menu==44?'true':'false'):'false'}}" class="collapse {{isset($menu)?($menu==44?'in':''):''}}" {{isset($menu)?($menu==44?'':'style="height: 0px;"'):'style="height: 0px;"'}}>
        <li {{isset($sub_menu)?($sub_menu==$menu.'S1'?'class=active':''):''}}><a href="{{route('admin.prod_categories')}}">Products Categories</a></li>
        <li {{isset($sub_menu)?($sub_menu==$menu.'S2'?'class=active':''):''}}><a href="{{route('admin.products')}}">Product List</a></li>
    </ul>
</li>

{{--<li {{isset($menu)?($menu==4?'class=active':''):''}}>--}}
{{--    <a href="{{route('admin.settings')}}"><i class="fa fa-gear"></i><span>Settings</span></a>--}}
{{--</li>--}}


<li class="heading">Admin Settings</li>
<li {{isset($menu)?($menu==100?'class=active':''):''}}>
<a href="{{route('admin.profile')}}"><i class="fa fa-gear"></i><span>Profile</span></a>
</li>
