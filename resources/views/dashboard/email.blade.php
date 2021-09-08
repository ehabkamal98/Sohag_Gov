@extends('dashboard.dashboard')
@section('title')
    بريد الزوار
@endsection
@section('content')
    <div class="row m-5">
        <input class="col-md-2 form-control-sm" type="text" id="search" onkeyup="fun_search()" name="search" placeholder="بحث ... " autocomplete="off">
        <h2 class="text-center col-md-10"> <i class="fas fa-at"> </i>   بريد الزوار  </h2>
    </div>
    <div class="row m-2 p-5">
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
                    <th width="40%" class="align-middle"><i class="fas fa-file"></i> البريد الالكتروني </th>
                    <th width="30%" class="align-middle"><i class="fas fa-calendar-alt"></i> تاريخ الاضافة </th>
                    <th width="20%" class="align-middle"><i class="fas fa-tools"></i> اجراءات </th>
                </tr>
                </thead>
                <tbody>
                @foreach($emails as $email)
                    <tr id="data">
                        <td class="align-middle">{{$loop->iteration}}</td>
                        <td class="align-middle">{{$email->email}}</td>
                        <td class="align-middle">{{$email->created_at->format('Y/m/d')}}</td>
                        <td>
                            <a  data-toggle="modal" data-target="#del_email" class="btn btn-danger m-2 btn-mini deleteRecord del_email" data-id="{{$email->id}}"><i class="fas fa-minus-circle"></i> حذف </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Start Delete Modal--}}
    <div class="modal fade" id="del_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100 font-weight-bold"> حذف بريد الكتروني </h5>
                </div>
                <div class="modal-body text-center">
                    هل انت متأكد من حذف البريد الالكتروني ؟
                </div>
                <div class="modal-footer">
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
    $(document).on('click','.del_email',function () {
        var id=$(this).data('id');
        var action="{{route('del_email',"id")}}";
        action=action.replace('id',id);
        $('#del').attr('action',action);
        $('#del_email').modal('show');
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


