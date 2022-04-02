@extends('layouts.master')

@section('title','Dashboard')
@section('content')

<!-- Modal Hospital -->
<div class="modal fade" id="issueslistModal" name="issueslistModal" tabindex="-1" role="dialog"
    aria-labelledby="issuesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="issuesModalLabel">แก้ไขข้อมูลโรงพยาบาล</h5>
                <!-- <button type="button" id="modalhptclosed" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button> -->
            </div>
            <!-- <form action="{{ url('/appointment-add') }}" method="post"> -->
            <form id="edithospital">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input id="h_id" value="" class="form-control @error('h_id') is-invalid @enderror" name="h_id"
                        required autocomplete="h_id" hidden="true">
                    <div class="form-group">
                        <label for="">ชื่อโรงพยาบาล : </label>
                        <input type="text" id="h_name2" name="h_name2" class="form-control" value="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">เบอร์ติดต่อ : </label>
                        <input type="text" id="h_tel2" name="h_tel2" class="form-control" value="" placeholder="">
                    </div>

                    <div id="result">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="modalhptclosed" class="btn btn-secondary"
                        data-dismiss="modal">ปิด</button>
                    <button type="submit" id="submit" name="submit" value="Submit"
                        class="btn btn-primary">อัพเดท</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<div class="container-fluid px-4">
    <div class="column">
        <h1 class="mt-4">จัดการข้อมูลโรงพยาบาล</h1>
    </div>

    <!-- add_hospital -->
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                แบบฟอร์มเพิ่มข้อมูลโรงพยาบาล
                <div class="card-body">
                    <form method="POST" action="{{ url('add_hospital') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <!-- <div class="col-sm-12"> -->

                            <label for="h_name"
                                class="col-sm-2 col-form-label text-md-right">{{ __('ชื่อโรงพยาบาล : ') }}</label>
                            <div class="col-sm-4">
                                <input id="h_name" value="" class="form-control @error('h_name') is-invalid @enderror"
                                    name="h_name" required autocomplete="h_name">
                            </div>
                            <label for="h_tel"
                                class="col-sm-1 col-form-label text-md-right">{{ __('เบอร์ติดต่อ : ') }}</label>
                            <div class="col-sm-3">
                                <input id="h_tel" value="" class="form-control @error('h_tel') is-invalid @enderror"
                                    name="h_tel" required autocomplete="h_tel">
                            </div>
                            <!-- </div> -->
                            <div class="col">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('เพิ่มข้อมูลโรงพยาบาล') }}
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            ตารางข้อมูลโรงพยาบาล
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th style="text-align: center;">ลำดับ</th>
                        <th style="text-align: center;">โรงพยาบาล</th>
                        <th style="text-align: center;">เบอร์ติดต่อ</th>
                        <th style="text-align: center;">แก้ไข</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th style="text-align: center;">ลำดับ</th>
                        <th style="text-align: center;">โรงพยาบาล</th>
                        <th style="text-align: center;">เบอร์ติดต่อ</th>
                        <th style="text-align: center;">แก้ไข</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php($i=1)
                    @foreach($hospital as $row)
                    <tr>
                        <td style="text-align: center;">{{$i}}</td>
                        <td style="text-align: center;">{{$row->h_name}}</td>
                        <td style="text-align: center;">{{$row->h_tel}}</td>
                        <td style="text-align: center;">
                            <button class="btn btn-success open_modal" value="{{$row->h_id}}">แก้ไข</button>
                        </td>
                    </tr>
                    @php($i++)
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>

<script>
$(document).ready(function() {

    $('#edithospital').on('submit', function(e) {
        e.preventDefault();
        // console.log($(this).serialize());
        var h_id = $("#h_id").val();
        var h_name2 = $("#h_name2").val();
        var h_tel2 = $("#h_tel2").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/edit_hospital",
            data: {
                h_id: h_id,
                h_name2: h_name2,
                h_tel2: h_tel2,
            },
            success: function(response) {
                console.log(response);
                // $("#result").html(
                //     '<div class="alert alert-success" role="alert" id="result">อัพเดทสำเร็จ</div>'
                // );
                $('#issueslistModal').modal('hide');
                window.location.reload(true);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $('#modalhptclosed').click(function() {
        $('#issueslistModal').modal('hide');
    });
});

$(document).on('click', '.open_modal', function() {
    var url = "{!!URL::to('findh_id')!!}";
    var h_id = $(this).val();
    $.get(url + '/' + h_id, function(data) {
        //success data
        // console.log(data);
        $('#h_id').val(data[0].h_id);
        $('#h_name2').val(data[0].h_name);
        $('#h_tel2').val(data[0].h_tel);
        // $('#details').val(data.details);
        // $('#btn-save').val("update");
        $('#issueslistModal').modal('show');
    })
});
</script>

@endsection