@extends('layouts.admin')
@push('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script type="text/javascript">

    Dropzone.options.dropzoneForm = {
        autoProcessQueue : false,
        acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",

        init:function(){
            var submitButton = document.querySelector("#submit-all");
            myDropzone = this;

            submitButton.addEventListener('click', function(){
                myDropzone.processQueue();
            });

            this.on("complete", function(){
                if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                {
                    var _this = this;
                    _this.removeAllFiles();
                }
                load_images();
            });

        }

    };

    load_images();

    function load_images()
    {
        $.ajax({
            url:"{{ route('admin.gallery.img_fetch') }}",
            success:function(data)
            {
                $('#uploaded_image').html(data);
            }
        })
    }

    $(document).on('click', '.removeImage', function(){
        var del_id = $(this).attr('data-id');
        $.ajax({
            url:"{{ route('admin.gallery.img_delete',[''])}}/"+del_id,
            success:function(data){
                load_images();
            }
        })
    });

</script>
@endpush
@push('custom-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
@endpush


@section('content')
    <script>
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }

        $(document).ready(function(){
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




                            <div class="container-fluid">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Select Image</h5>
                                    </div>
                                    <div class="panel-body">
                                        <form id="dropzoneForm" class="dropzone" action="{{ route('admin.gallery.img_uploads') }}">
                                            @csrf
                                        </form><br/>
                                        <div align="center">
                                            <button type="button" class="btn btn-primary" id="submit-all"><i class="fa fa-upload"></i> Upload</button>
                                        </div>
                                    </div>
                                </div>
                                <br />
                            </div>













                            <form id="basic-form" method="post" action="{{route('admin.gallery.img_uploads')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="list-group">
                                            <li class="list-group-item active"><i class="fa fa-image"></i> Images</li>
                                            <li class="list-group-item bg_color">

                                                <div class="panel-body" id="uploaded_image">

                                                </div>

                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>


            </div>


        </div>




    </div>



@endsection
