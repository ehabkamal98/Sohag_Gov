@extends('dashboard.dashboard')
@section('title')
    المقالات

@endsection
@section('content')
<div class="row m-5" >
    <div class="text-center col-md-2 col-6" >
        <a href="{{route('create_post')}}" class="btn btn-success" data-toggle="" data-target="" ><i class="nav-icon fas fa-plus"></i> اضافة مقال </a>
    </div>
    <h2 class="text-center col-md-7 col-6"> <i class="fa fa-file-alt "> </i> المقالات  </h2>
</div>

    <div class="row m-2 p-1">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center font-weight-bold " role="alert" style="width: 100%">
                {{session('success')}} <i class="fa fa-check-circle"></i>
            </div>
        @endif
        @if(session('failed'))
            <div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold " role="alert" style="width: 100%">
                {{session('failed')}} <i class="fa fa-times-circle"></i>
            </div>
        @endif
        <div class="card table-responsive m-1" style="width: 100%">
            <table class="table table-bordered table-hover data-table" style="vertical-align: middle;text-align: center;"  id="posts">
                <thead class="thead-light">
                <tr>
                    <th width="30%" ><i class="fa fa-image"></i> صورة </th>
                    <th width="20%" class="align-middle"><i class="fas fa-file"></i> عنوان المقال </th>
                    <th width="20%" class="align-middle"><i class="fas fa-folder"></i> القسم</th>
                    <th width="15%" class="align-middle"><i class="fas fa-calendar-day"></i> تاريخ الاصدار </th>
                    <th width="15%" class="align-middle"><i class="fas fa-tools"></i> اجراءات </th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr id="data">
                        <td class="align-middle"><img src="{{asset('assets/img/posts/'.$post->photo)}}" class="rounded mx-auto d-block" style="width:350px;height: 200px;"></td>
                        <td class="align-middle">{{$post->title}}</td>
                        <td class="align-middle">{{$post->category->name}}</td>
                        <td class="align-middle">{{$post->magazine_date}}</td>
                        <td>
                            <a class="btn btn-primary m-2" href="{{route('edit_post',$post->id)}}" ><i class="nav-icon fas fa-edit"></i> تعديل </a>
                            <a  data-toggle="modal" data-target="#del_post" class="btn btn-danger m-2 btn-mini deleteRecord del_post" data-id="{{$post->id}}"><i class="fas fa-minus-circle"></i> حذف </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Start Delete Modal--}}
     <div class="modal fade" id="del_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100 font-weight-bold"> حذف مقال </h5>
                </div>
                <div class="modal-body text-center">
                    هل انت متأكد من حذف المقال ؟
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
    $(document).on('click','.del_post',function () {
        var id=$(this).data('id');
        var action="{{route('delete_post',"id")}}";
        action=action.replace('id',id);
        $('#del').attr('action',action);
        $('#del_post').modal('show');
    });

</script>

