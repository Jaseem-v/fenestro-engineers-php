@extends('layouts.admin')
@section('content')
    <script>
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }

        $(document).ready(function(){
            $(".actionBtn").click(function(){
                file=$(".file");
                var maxSize = '50100';

                if(!(file.val() == null || file.val() == "") && !/(\.gif|\.jpg|\.jpeg|\.png|\.JPEG|\.JPG|\.PNG)$/i.test(file.val())) {
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
                }
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

                <div class="col-md-2"></div>

                <div class="col-md-8">
                    <div class="card" style="border-color:#2b2e33">
                        <!--                        <div class="header">-->
                        <!--                            <h2>Basic Validation</h2>-->
                        <!--                        </div>-->
                        <!--                        <hr/>-->
                        <div class="body">

                            <div id="msg">

                                @if ($message = Session::get('view_msg'))
                                    {!! $message !!}
                                @endif

                            </div>


                            <form id="basic-form" method="post" action="{{route('admin.settings_post')}}" enctype="multipart/form-data">
                                @csrf



                                <div class="form-group">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>

                                            <th>

                                                <input type="file" name="image"  class="filestyle file image" data-input="false" id="filestyle-1" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">

                                                <div class="bootstrap-filestyle input-group">
                                                <span class="group-span-filestyle" tabindex="0">
                                                <label for="filestyle-1" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span>
                                                <span class="buttonText">&nbsp;Select Logo</span></label></span></div>


                                            </th>




                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>

                                            <td><img id="blah1" width="250" height="100" src="{{$result?($result->logo==''?url('assets/admin/no_img.png'):url('uploads/'.$result->logo)):url('assets/admin/no_img.png')}}"></td>

                                        </tr>

                                        </tbody>
                                    </table>
                                </div>


                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" id="phone" name="phone" value="{{$result?$result->phone:''}}">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" id="email" name="email" value="{{$result?$result->email:''}}">
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" id="address" name="address">{{$result?$result->address:''}}</textarea>
                                </div>

                                <br/>
                                <h5>Social Media Links</h5>
                                <hr/>

                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input class="form-control" id="facebook" name="facebook" value="{{$result?$result->facebook:''}}">
                                </div>

                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input class="form-control" id="instagram" name="instagram" value="{{$result?$result->instagram:''}}">
                                </div>

                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input class="form-control" id="twitter" name="twitter" value="{{$result?$result->twitter:''}}">
                                </div>


                                <div class="form-group">
                                    <label>Linkedin</label>
                                    <input class="form-control" id="linkedin" name="linkedin" value="{{$result?$result->linkedin:''}}">
                                </div>


                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input class="form-control" id="youtube" name="youtube" value="{{$result?$result->youtube:''}}">
                                </div>


                                <br/>
                                <button type="button" class="btn btn-primary actionBtn">Update</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>


            </div>

        </div>




    </div>



@endsection
