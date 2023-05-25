@extends('layouts.admin')
@push('custom-scripts')
@endpush
@push('custom-style')
@endpush


@section('content')
    <script>
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }

        $(document).ready(function(){
            $(".status_btn").click(function(){
                $(this).html('<i class="fa fa-spinner fa-spin"></i> <span>Loading...</span>');
                $(this).attr("disabled", true);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $this= $(this);
                $.ajax({
                    type: 'post',
                    url: '{{route('admin.testimonial_status_ajx',[''])}}/'+$(this).data("id"),
                    dataType: 'json',
                    success: function (data) {
                        if(data.status=='1')
                        {

                            $this.html('Deactivate');
                            $this.attr("disabled", false);
                            $this.removeClass("btn-success");
                            $this.addClass("btn-warning");

                            $this.closest("tr").find('.status_badge').text('Active');
                            $this.closest("tr").find('.status_badge').removeClass("badge-danger");
                            $this.closest("tr").find('.status_badge').addClass("badge-success");

                        }
                        else{
                            $this.html('Active');
                            $this.attr("disabled", false);
                            $this.removeClass("btn-warning");
                            $this.addClass("btn-success");



                            $this.closest("tr").find('.status_badge').text('Deactivated');
                            $this.closest("tr").find('.status_badge').removeClass("badge-success");
                            $this.closest("tr").find('.status_badge').addClass("badge-danger");



                        }

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });



            });
            $(".actionBtn2").click(function(){
                description=$("#description").val();
                fname=$("#fname").val();
                place=$("#place").val();
                file=$(".file");
                var maxSize = '50100';
                if(description == null || description== "")
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Description</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(fname == null || fname== "")
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Name</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(place == null || place== "")
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Place</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(file.val() == null || file.val() == "")
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Select Image</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(!/(\.gif|\.jpg|\.jpeg|\.png|\.JPEG|\.JPG|\.PNG)$/i.test(file.val())) {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Select Only Image File(Eg: .gif, .jpg, .png etc)...</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if((file[0].files[0].size/1024) > maxSize)
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  File size must under 5 MB!...</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else
                {
                    $(this).html('<i class="fa fa-spinner fa-spin"></i> <span>Loading...</span>');
                    $(this).attr("disabled", true);
                    $("#basic-form2").submit();
                }
            });
            $(".actionBtn").click(function(){
                /*
                title=$("#title").val();
                description=$("#description").val();
                file=$(".file");
                var maxSize = '50100';

                if(title == null || title== "")
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Title</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(description == null || description== "")
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Description</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(!(file.val() == null || file.val() == "") && !/(\.gif|\.jpg|\.jpeg|\.png|\.JPEG|\.JPG|\.PNG)$/i.test(file.val())) {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Select Only Image File(Eg: .gif, .jpg, .png etc)...</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(!(file.val() == null || file.val() == "") && (file[0].files[0].size/1024) > maxSize)
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  File size must under 5 MB!...</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else
                {
                    $(this).html('<i class="fa fa-spinner fa-spin"></i> <span>Loading...</span>');
                    $(this).attr("disabled", true);
                    $("#basic-form").submit();
                }*/
                $(this).html('<i class="fa fa-spinner fa-spin"></i> <span>Loading...</span>');
                $(this).attr("disabled", true);
                $("#basic-form").submit();
            });
        });

    </script>





    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-8 col-sm-12">
                        <h2><?=isset($pageTitle)?$pageTitle:''?></h2>
                    </div>





                </div>
            </div>
            <hr/>
            <div class="row clearfix">

                <div class="col-md-1"></div>

                <div class="col-md-10">
                    <div class="card" style="border-color:#2b2e33">
                        <!--                        <div class="header">-->
                        <!--                            <h2>Basic Validation</h2>-->
                        <!--                        </div>-->
                        <!--                        <hr/>-->
                        <div class="body">

                                @if ($message = Session::get('view_msg2'))
                                    {!! $message !!}
                                @endif

                            <h5>Testimonials</h5>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add</button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" place="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Testimonial</h4>
                                        </div>
                                        <div class="modal-body">


                                            <div id="msg"></div>


                                            <form id="basic-form2" method="post" action="{{route('admin.add_testimonial_post')}}"  enctype="multipart/form-data">
                                                @csrf







                                                <div class="form-group">
                                                    <label>Testimonial</label>
                                                    <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                                                </div>

                                                <br/>
                                                <br/>
                                                <hr/>
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input class="form-control" id="fname" name="fname" maxlength="15">
                                                </div>

                                                <div class="form-group">
                                                    <label>Place</label>
                                                    <input class="form-control" id="place" name="place" maxlength="25">
                                                </div>

                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>

                                                            <th>

                                                                <input type="file" name="image" class="filestyle file image" data-input="false" id="filestyle-1" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">
                                                                <div class="bootstrap-filestyle input-group">
                                                <span class="group-span-filestyle" tabindex="0">
                                                <label for="filestyle-1" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span>
                                                <span class="buttonText">&nbsp;Select Image</span></label></span></div>


                                                            </th>




                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><img id="blah1" width="145" height="145" src="{{url('assets/admin/no_img.png')}}"></td>

                                                        </tr>

                                                        </tbody>
                                                    </table>








                                                </div>



                                                <br/>
                                                <button type="button" class="btn btn-primary actionBtn2">Add</button>
                                            </form>









                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>








                            <div class="body table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="10%">Name</th>
                                        <th width="10%">Place</th>
                                        <th width="5%">Image</th>
                                        <th width="30%">Description</th>
                                        <th width="5%">Status</th>
                                        <th width="5%">Show</th>
                                        <th width="5%">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if(count($testimonials)==0)
                                        <tr>
                                            <th colspan="9" style=" text-align: center;">

                                                <div class="alert alert-warning">
                                                    <h5><i class="fa fa-warning"></i> not found!</h5>

                                                </div>

                                            </th>
                                        </tr>
                                    @endif




                                    @foreach($testimonials as $index=>$item)
                                        <tr>
                                            <th scope="row">{{$index+1}}</th>
                                            <th scope="row">{{$item->fname}}</th>
                                            <th scope="row">{{$item->place}}</th>
                                            <th scope="row"><img width="100" height="100" src="{{url('uploads/'.$item->image)}}"></th>
                                            <th scope="row">{{$item->description}}</th>
                                            <th scope="row">


                                                @if($item->status=='1')<span class="badge badge-success status_badge">Active</span>
                                                @else<span class="badge badge-danger status_badge">Deactivated</span>@endif

                                            </th>
                                            <td>
                                                <button class="btn {{$item->status=='1'?'btn-warning':'btn-success'}} btn-sm status_btn" data-id="{{ $item->id }}">{!! $item->status=='1'?'Deactivate':'Active'!!}</button>
                                            </td>
                                            <td>
                                                <a onclick="del_itm('{{$item->id}}')" href='javascript:void(0)' class='btn btn-danger btn-sm'
                                                   data-toggle='modal' data-target='#del_itm_Modal-{{ $item->id }}' data-keyboard='false'
                                                   data-backdrop='static'><i class='fa fa-trash-o'></i></a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="del_itm_Modal-{{ $item->id }}" tabindex="-1" place="dialog">
                                            <div class="modal-dialog" place="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="title" id="defaultModalLabel"><i class="icon-trash"></i> Confirmation Message</h4>
                                                    </div>
                                                    <div class="modal-body"> <p>Do you really want to <strong>Delete</strong>?</p></div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn btn-default"><i class="fa fa-close"></i> Cancel</button>
                                                        <form class="submitForm{{$item->id}}" action="{{route('admin.testimonial_delete', $item->id)}}" method="post">
                                                            @csrf
                                                            <button type="button" class="btn btn-sm btn-danger deleteBtn-{{ $item->id }}"><i class="fa fa-trash-o"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(function(){
                                                $(".deleteBtn-{{ $item->id }}").click(function(){
                                                    $(this).html('<i class="fa fa-spinner fa-spin"></i> <span>Loading...</span>');
                                                    $(this).attr("disabled", true);
                                                    $(".submitForm{{$item->id}}").submit();
                                                });
                                            });
                                        </script>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>





                        </div>
                    </div>
                </div>

                <div class="col-md-1"></div>


            </div>


        </div>




    </div>



@endsection
