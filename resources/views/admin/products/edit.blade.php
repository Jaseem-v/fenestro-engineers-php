@extends('layouts.admin')
@section('content')
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
                    url:"{{ route('admin.product_images.img_fetch',[$result->id]) }}",
                    success:function(data)
                    {
                        $('#uploaded_image').html(data);
                    }
                })
            }

            $(document).on('click', '.removeImage', function(){
                var del_id = $(this).attr('data-id');
                $.ajax({
                    url:"{{ route('admin.product_images.img_delete',[''])}}/"+del_id,
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
    <script>
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }

        $(document).ready(function(){
            $(".actionBtn").click(function(){
                prod_cat=$("#prod_cat");
                product_name=$("#product_name");
                description=$("#description");
                if(prod_cat.val() == null || prod_cat.val() == "") {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Select Product Category</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(product_name.val() == null || product_name.val() == "") {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Product name</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(description.val() == null || description.val() == "") {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Product Description</div>");
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


        <script>
        $(function(){
            $('#addMore').on('click', function() {
                var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                data.find("input").val('');
            });
            $(document).on('click', '.remove', function() {
                var trIndex = $(this).closest("tr").index();
                if(trIndex>1) {
                    $(this).closest("tr").remove();
                } else {
                    alert("Sorry!! Can't remove first row!");
                }
            });

            $('#addMoreFeatures').on('click', function() {
                var data = $("#tbFeatures tr:eq(1)").clone(true).appendTo("#tbFeatures");
                data.find("input").val('');
            });
            $(document).on('click', '.removeFeatures', function() {
                var trIndex = $(this).closest("tr").index();
                if(trIndex>1) {
                    $(this).closest("tr").remove();
                } else {
                    alert("Sorry!! Can't remove first row!");
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
                        <a href="{{route('admin.products')}}" class="btn btn-dark  btn-sm"><i class="icon-action-undo"></i> Back</a>

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
                                @if ($message = Session::get('edit_msg'))
                                    {!! $message !!}
                                @endif
                            </div>


                            <form id="basic-form" method="post" action="{{route('admin.products.editSave',[$result->id])}}" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label>Products Categories</label>
                                    <select class="form-control" id="prod_cat" name="prod_cat">
                                      <option value="">Select</option>
                                        @foreach($prod_categories as $prod_categories_item)
                                        <option value="{{$prod_categories_item->id}}" {{$result->prod_cat_id==$prod_categories_item->id?'selected':''}} >{{$prod_categories_item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Product name</label>
                                    <input class="form-control" id="product_name" name="product_name" value="{{$result?$result->product_name:''}}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="5" id="description" name="description">{{$result?$result->description:''}}</textarea>
                                </div>
                                @php
                                    $color_json=json_decode($result->color_json?$result->color_json:'[]');
                                    $features_json=json_decode($result->features_json?$result->features_json:'[]');
                                @endphp

                                <h2>Color</h2>
                                <table  class="table table-hover small-text" id="tb">

                                    <tr class="tr-header">
                                        <th>Color</th>
                                        <th>Value</th>
                                        <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Color"><span class="glyphicon glyphicon-plus"></span></a></th>

                                    @if($color_json)
                                    @foreach($color_json as $color_json_item)
                                    <tr>
                                        <td><input type="text" name="color_name[]" class="form-control" value="{{$color_json_item->color_name}}"></td>
                                        <td><input type="text" name="color_value[]" class="form-control" value="{{$color_json_item->color_value}}"></td>
                                        <td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
                                    </tr>
                                   @endforeach
                                   @else
                                        <tr>
                                            <td><input type="text" name="color_name[]" class="form-control"></td>
                                            <td><input type="text" name="color_value[]" class="form-control"></td>
                                            <td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
                                        </tr>
                                   @endif
                                </table>



                                <h2>Features</h2>
                                <table  class="table table-hover small-text" id="tbFeatures">
                                    <tr class="tr-header">
                                        <th>Features</th>
                                        <th>Value</th>
                                        <th><a href="javascript:void(0);" style="font-size:18px;" id="addMoreFeatures" title="Add More Features"><span class="glyphicon glyphicon-plus"></span></a></th>
                                    @if($features_json)
                                        @foreach($features_json as $features_json_item)
                                    <tr>
                                        <td><input type="text" name="features[]" class="form-control" value="{{$features_json_item->features}}"></td>
                                        <td><input type="text" name="feat_value[]" class="form-control" value="{{$features_json_item->feat_value}}"></td>
                                        <td><a href='javascript:void(0);'  class='removeFeatures'><span class='glyphicon glyphicon-remove'></span></a></td>
                                    </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td><input type="text" name="features[]" class="form-control"></td>
                                            <td><input type="text" name="feat_value[]" class="form-control"></td>
                                            <td><a href='javascript:void(0);'  class='removeFeatures'><span class='glyphicon glyphicon-remove'></span></a></td>
                                        </tr>
                                    @endif
                                </table>
                                <br/>
                                <button type="button" class="btn btn-primary actionBtn">Update</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>



            </div>


            <div class="row clearfix">

                <div class="col-md-2"></div>

                <div class="col-md-8">
                    <div class="card" style="border-color:#2b2e33">
                        <!--                        <div class="header">-->
                        <!--                            <h2>Basic Validation</h2>-->
                        <!--                        </div>-->
                        <!--                        <hr/>-->
                        <div class="body">

                            <div class="container-fluid">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Select Product Images</h5>
                                    </div>
                                    <div class="panel-body">
                                        <form id="dropzoneForm" class="dropzone" action="{{ route('admin.product_images.img_uploads',[$result->id]) }}">
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
