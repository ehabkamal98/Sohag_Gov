@extends('dashboard.dashboard')
@section('title')
    الاقسام
@endsection
@section('content')

    <div class="row m-5" >
        <input class="col-md-2 form-control-sm" type="text" id="search" onkeyup="fun_search()" name="search" placeholder="بحث بالقسم ... " autocomplete="off">
        <h2 class="text-center col-md-7 col-6"> <i class="fa fa-folder "> </i> الاقسام  </h2>
        <div class="text-center col-md-2 col-6" >
            <a class="btn btn-success" data-toggle="modal" data-target="#add_category"><i class="nav-icon fas fa-plus"></i> اضافة قسم </a>
        </div>
    </div>

    <div class="row m-2 p-1">
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show text-center font-weight-bold " role="alert" style="width: 100%">
                {{session('message')}}
            </div>
        @endif
        <div class="card table-responsive" style="width: 100%">
            <table class="table table-bordered data-table table-hover" style="vertical-align: middle;text-align: center;">
                <thead class="thead-light">
                <tr>
                    <th width="10%" class="align-middle"> # </th>
                    <th width="50%" class="align-middle"><i class="fas fa-file"></i> القسم </th>
                    <th width="20%" class="align-middle"><i class="fas fa-file-alt"></i> عدد المقالات </th>
                    <th width="20%" class="align-middle"><i class="fas fa-tools"></i> اجراءات </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr id="data">
                        <td class="align-middle">{{$category->order}}</td>
                        <td class="align-middle">{{$category->name}}</td>
                        <td class="align-middle">{{$category->posts->count()?$category->posts->count():0}}</td>
                        <td>
                            <a class="btn btn-primary edit_category m-2" data-target="#edit_category" data-id="{{$category->id}}" data-name="{{$category->name}}" data-order="{{$category->order}}" data-toggle="modal" ><i class="nav-icon fas fa-edit"></i> تعديل </a>
                            <a  data-toggle="modal" data-target="#del_category" class="btn btn-danger m-2 btn-mini deleteRecord del_category" data-id="{{$category->id}}"><i class="fas fa-minus-circle"></i> حذف </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{--Start Add Modal--}}
    <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document" >
            <form role="form" method="POST" action="{{route('add_category')}}" autocomplete="off">
                @csrf
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">قسم جديد</h4>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-2" >
                            <label  data-error="wrong" data-success="right" ><i class="fas fa-file prefix grey-text"></i>   اسم القسم </label>
                            <input type="text"  name='name' class="form-control validate" required>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-success"> اضافة <i class="fas fa-plus ml-1"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--End Add Modal--}}

    {{--Start Edit Modal--}}
    <div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document" >
            <form id="edit" role="form" method="POST" action="" autocomplete="off">
                @csrf
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">تعديل القسم</h4>
                    </div>
                    <div class="modal-body mx-3 row">
                        <div class="md-form mb-2 col-8" >
                            <label  data-error="wrong" data-success="right" ><i class="fas fa-file prefix grey-text"></i>   اسم القسم </label>
                            <input type="text" id="name" name='name' class="form-control validate" required>
                        </div>
                        <div class="md-form mb-2 col-4" >
                            <label  data-error="wrong" data-success="right" ><i class="fa fa-sort-numeric-down prefix grey-text"></i>   الترتيب </label>
                            <input type="number" id="order" min="1" name='order' class="form-control validate text-center" required>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-success"> تعديل <i class="fas fa-edit ml-1"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--End Edit Modal--}}

    {{-- Start Delete Modal--}}
    <div class="modal fade" id="del_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100 font-weight-bold"> حذف قسم </h5>
                </div>
                <div class="modal-body text-center">
                    هل انت متأكد من حذف القسم ؟
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <form id="del" role="form" method="GET" action="">
                        <button class="btn btn-danger"><i class="fas fa-minus-circle"></i> حذف </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Delete Modal --}}

@endsection
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script>
    $(document).on('click', '.edit_category', function() {
        $('#name').val($(this).data('name'));
        $('#order').val($(this).data('order'));
        var id=$(this).data('id');
        var action="{{route('edit_category',"id")}}";
        action=action.replace('id',id);
        $('#edit').attr('action',action);
        $('#edit_category').modal('show');
    });
    $(document).on('click','.del_category',function () {
        var id=$(this).data('id');
        var action="{{route('del_category',"id")}}";
        action=action.replace('id',id);
        $('#del').attr('action',action);
        $('#del_category').modal('show');
    });
    $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("table #data").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

