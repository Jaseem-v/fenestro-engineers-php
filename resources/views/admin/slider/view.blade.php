@extends('layouts.admin')

@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2><?=isset($pageTitle)?$pageTitle:''?></h2>

                </div>


                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <a href="{{route('admin.slider.create')}}" class="btn btn-primary btn-lg"><i class="fa fa-plus-square"></i> Add</a>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row clearfix">


            <div class="col-lg-12">


                @if ($message = Session::get('view_msg'))
                   {!! $message !!}
                @endif


<style>
    .typeahead.tt-hint {
        color: lightgrey;
    }
</style>


                <div class="card">

                    <div class="body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="5%"><h5>#</h5></th>
                                <th width="10%"><h5>Top Title</h5></th>
                                <th width="5%"><h5>Heading</h5></th>
                                <th width="5%"><h5>Image</h5></th>
                                <th width="5%"><h5>Status</h5></th>
                                <th width="10%"><h5>Action</h5></th>
                            </tr>
                            </thead>
                            <tbody>




                            @if(count($result)==0)
                                <tr>
                                    <th colspan="9" style=" text-align: center;">

                                        <div class="alert alert-warning">
                                            <h5><i class="fa fa-warning"></i> not found!</h5>

                                        </div>

                                    </th>
                                </tr>
                             @endif




                            @foreach($result as $index=>$item)
                                <tr>
                                    <th scope="row">{{($result->total()-$index)-$result->firstItem()+1}}</th>
                                    <th scope="row">{{$item->top_title}}</th>
                                    <th scope="row">{{$item->heading}}</th>
                                    <th scope="row"><img width="100" height="100" src="{{url('uploads/'.$item->file.'.webp')}}"></th>
                                    <th scope="row">

                                       @if($item->btn1Visible=='1')
                                       <span class="badge badge-success">Button Active</span>
                                        @else
                                       <span class="badge badge-danger">Button Inactive</span>
                                        @endif

                                    </th>
                                    <td>
                                        <a href="{{route('admin.slider.editShow',$item->id)}}{{isset($_GET['keyword'])?'?keyword='.$_GET['keyword']:''}}"
                                           class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>

                                        <a onclick="del_itm('{{$item->id}}')" href='javascript:void(0)' class='btn btn-danger'
                                           data-toggle='modal' data-target='#del_itm_Modal-{{ $item->id }}' data-keyboard='false'
                                           data-backdrop='static'><i class='fa fa-trash-o'></i></a>

                                    </td>
                                </tr>

                                <div class="modal fade" id="del_itm_Modal-{{ $item->id }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="title" id="defaultModalLabel"><i class="icon-trash"></i> Confirmation Message</h4>
                                            </div>
                                            <div class="modal-body"> <p>Do you really want to <strong>Delete</strong>?</p></div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default"><i class="fa fa-close"></i> Cancel</button>
                                                <form class="submitForm{{$item->id}}" action="{{route('admin.slider.delete', $item->id)}}" method="post">
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
           <hr/>

            <nav aria-label="Page navigation example">
                @php
                    $pagelinks = array(
                    'keyword' => isset($_GET['keyword'])?$_GET['keyword']:'',
                    );
                @endphp
                {{$result->appends($pagelinks)->links('pagination::bootstrap-4')}}
            </nav>

        </div>
    </div>
</div>
@endsection
