@extends('layouts.admin')
@section('content')
    @push('custom-style')
        <link rel="stylesheet" href="{{url('assets/admin/vendor/summernote/dist/summernote.css')}}">
    @endpush

    @push('custom-scripts')
        <script src="{{url('assets/admin/vendor/summernote/dist/summernote.js')}}"></script>
    @endpush




    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script>
   function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }

    $(document).ready(function(){
        $(".actionBtn").click(function(){
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
                        <hr/>
                        <a href="{{route('admin.blog')}}" class="btn btn-dark  btn-sm"><i class="icon-action-undo"></i> Back</a>

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

                            <div id="msg"></div>


                            <form id="basic-form" method="post" action="{{route('admin.blog.save')}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text"  class="form-control" id="title" name="title" value="">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control summernote" id="description" name="description"></textarea>
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
                                <button type="button" class="btn btn-primary actionBtn">Add</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>



            </div>
        </div>




    </div>



@endsection
