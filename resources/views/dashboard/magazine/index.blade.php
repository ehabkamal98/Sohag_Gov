
@extends('dashboard.dashboard')
@section('title')
    المجلات
@endsection
@section('content')
    <div class="row m-5">
        <input class="col-md-2 form-control-sm" type="text" id="search" onkeyup="fun_search()" name="search" placeholder="بحث ... " autocomplete="off">
        <h2 class="text-center col-md-8 col-12"> <i class="fas fa-file-pdf"> </i> المجلات  </h2>
        <div class="text-center col-md-2 col-12" >
            <a class="btn btn-success" data-toggle="modal" data-target="#add_magazine"><i class="nav-icon fas fa-plus"></i> انشاء اصدار </a>
        </div>
    </div>

    <div class="row m-2 p-1">
        <div class=" col-md-12 col-12">
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
        </div>
            <div class="col-md-12 col-12 row">
            @foreach($magazines as $magazine)
                <div class="card col-md-3 col-12 mb-3 m-3">
                    <div class="card-header row">
                        <h3 class="text-center col-8 mt-3">{{$magazine->title}}</h3>
                        <a  data-toggle="modal" data-target="#del_magazine" class="btn btn-danger col-md-3 m-1 del_magazine" data-id="{{$magazine->id}}"><i class="fas fa-minus-circle"></i> حذف </a>
                    </div>
                    <h5 class="card-body text-center ">تاريخ الاصدار : {{$magazine->date_arabic}}</h5>
                    @if($magazine->posts==$category)
                    <h5 class="text-center">  عدد المقالات <span class="float-left badge bg-info">{{$magazine->posts}}</span></h5>
                    @else
                        <h5 class="text-center">  عدد المقالات <span class="float-left badge bg-danger">{{$magazine->posts}}</span></h5>
                    @endif
                    <img class="rounded mx-auto d-block" style="height: 200px;width: 200px;" src="{{asset('assets/img/web.png')}}" />
                    <div class="card-footer text-center row">
                        @if($magazine->active)
                            <div class="ribbon ribbon-top-right"><span>تم الاصدار <i class="fa fa-check-circle"></i></span></div>
                            <form role="form" method="POST" action="{{route('un_create_magazine')}}">
                                @csrf
                                <a href="{{route('show_magazine',$magazine->date)}}" target="_blank" class="btn btn-primary float-right">
                                    <i class="fa fa-search"></i> عرض
                                </a>
                                <input type="hidden" name="id" value="{{$magazine->id}}">
                                <button type="submit" class="btn btn-danger float-right">
                                    <i class="fa fa-times"></i> الغاء الاصدار
                                </button>
                            </form>
                        @else
                            <form role="form" method="POST" action="{{route('create_magazine')}}">
                                @csrf
                                <a href="{{route('show_magazine',$magazine->date)}}" target="_blank" class="btn btn-primary float-right">
                                    <i class="fa fa-search"></i> عرض
                                </a>
                                <input type="hidden" name="id" value="{{$magazine->id}}">
                                <button type="submit" class="btn btn-success float-right">
                                    <i class="fa fa-upload"></i> اصدار
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
            </div>
    </div>

    {{--Start Add Modal--}}
    <div class="modal fade" id="add_magazine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document" >
            <form role="form" method="POST" action="{{route('add_magazine')}}" autocomplete="off">
                @csrf
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">اصدار جديد</h4>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-2" >
                            <label  data-error="wrong" data-success="right" ><i class="fas fa-file prefix grey-text"></i>   عنوان الاصدار </label>
                            <input type="text"  name='title' class="form-control validate" required>
                        </div>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-2" >
                            <label  data-error="wrong" data-success="right" ><i class="fas fa-calendar-day prefix grey-text"></i>   تاريخ الاصدار </label>
                            <input type="date"  name='date' class="form-control validate" required>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-success"> انشاء <i class="fas fa-plus ml-1"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--End Add Modal--}}

    {{-- Start Delete Modal--}}
    <div class="modal fade" id="del_magazine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100 font-weight-bold"> حذف اصدار </h5>
                </div>
                <div class="modal-body text-center">
                    هل انت متأكد من حذف الاصدار ؟
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

    $(document).on('click','.del_magazine',function () {
        var id=$(this).data('id');
        var action="{{route('del_magazine',"id")}}";
        action=action.replace('id',id);
        $('#del').attr('action',action);
        $('#del_magazine').modal('show');
    });
    $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".card").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
