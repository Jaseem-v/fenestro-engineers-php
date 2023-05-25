@extends('layouts.admin')
@section('content')
    @push('custom-style')
    @endpush
    @push('custom-scripts')
    @endpush





    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script>
   function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }

    $(document).ready(function(){
        $(".actionBtn").click(function(){
            prod_cat=$("#prod_cat");
            product_name=$("#product_name");
            if(prod_cat.val() == null || prod_cat.val() == "") {
                $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Select Product Category</div>");
                $("html, body").animate({scrollTop:0},"slow");
            }
            else if(product_name.val() == null || product_name.val() == "") {
                $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Product name</div>");
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

                            <div id="msg"></div>


                            <form id="basic-form" method="post" action="{{route('admin.products.save')}}"  enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label>Products Categories</label>
                                    <select class="form-control" id="prod_cat" name="prod_cat">
                                        <option value="">Select</option>
                                        @foreach($prod_categories as $prod_categories_item)
                                            <option value="{{$prod_categories_item->id}}">{{$prod_categories_item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Product name</label>
                                    <input class="form-control" id="product_name" name="product_name">
                                </div>

                                <br/>
                                <button type="button" class="btn btn-success actionBtn">Next <i class="fa fa fa-arrow-circle-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>



            </div>
        </div>




    </div>



@endsection
