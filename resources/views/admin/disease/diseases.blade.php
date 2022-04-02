@extends('layouts.master')

@section('title','Dashboard')
@section('content')

<!-- Modal Disease -->
<div class="modal fade" id="issueslistModal" name="issueslistModal" tabindex="-1" role="dialog"
    aria-labelledby="issuesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="issuesModalLabel">แก้ไขข้อมูลโรค</h5>
                <!-- <button type="button" id="modalhptclosed" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button> -->
            </div>
            <!-- <form action="{{ url('/appointment-add') }}" method="post"> -->
            <form id="editdisease">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input id="d_id" value="" class="form-control @error('d_id') is-invalid @enderror" name="d_id"
                        required autocomplete="d_id" hidden="true">
                    <div class="form-group">
                        <label for="">ชื่อโรค : </label>
                        <input type="text" id="d_name2" name="d_name2" class="form-control" value="" placeholder="">
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
        <h1 class="mt-4">จัดการข้อมูลโรค</h1>
    </div>

    <!-- add_hospital -->
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                แบบฟอร์มเพิ่มข้อมูลโรค
                <div class="card-body">
                    <form method="POST" action="{{ url('add_disease') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <!-- <div class="col-sm-12"> -->

                            <label for="d_name"
                                class="col-sm-2 col-form-label text-md-right">{{ __('ชื่อโรค : ') }}</label>
                            <div class="col-sm-4">
                                <input id="d_name" value="" class="form-control @error('d_name') is-invalid @enderror"
                                    name="d_name" required autocomplete="d_name">
                            </div>
                            <!-- </div> -->
                            <div class="col">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('เพิ่มข้อมูลโรค') }}
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
            ตารางข้อมูลโรค
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th style="text-align: center;">ลำดับ</th>
                        <th style="text-align: center;">โรค</th>
                        <th style="text-align: center;">แก้ไข</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th style="text-align: center;">ลำดับ</th>
                        <th style="text-align: center;">โรค</th>
                        <th style="text-align: center;">แก้ไข</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php($i=1)
                    @foreach($disease as $row)
                    <tr>
                        <td style="text-align: center;">{{$i}}</td>
                        <td style="text-align: center;">{{$row->d_name}}</td>
                        <td style="text-align: center;">
                            <button class="btn btn-success open_modal" value="{{$row->d_id}}">แก้ไข</button>
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

    $('#editdisease').on('submit', function(e) {
        e.preventDefault();
        // console.log($(this).serialize());
        var d_id = $("#d_id").val();
        var d_name2 = $("#d_name2").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/edit_disease",
            data: {
                d_id: d_id,
                d_name2: d_name2,
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
    var url = "{!!URL::to('findd_id')!!}";
    var d_id = $(this).val();
    $.get(url + '/' + d_id, function(data) {
        //success data
        // console.log(data);
        $('#d_id').val(data[0].d_id);
        $('#d_name2').val(data[0].d_name);
        // $('#details').val(data.details);
        // $('#btn-save').val("update");
        $('#issueslistModal').modal('show');
    })
});
</script>

@endsection