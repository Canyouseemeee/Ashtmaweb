@extends('layouts.master')

@section('title','Dashboard')
@section('content')
<!-- Modal Edit Medicine -->
<div class="modal fade" id="issueslistModal" name="issueslistModal" tabindex="-1" role="dialog"
    aria-labelledby="issuesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="issuesModalLabel">แก้ไขข้อมูลข้อความเตือนคนไข้</h5>
            </div>
            <form id="editnotipatient" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input id="nop_id" value="" class="form-control @error('nop_id') is-invalid @enderror" name="nop_id"
                        required autocomplete="nop_id" hidden="true">
                        <div class="form-group">
                        <label for="">ชื่อข้อความ : </label>
                        <input type="text" id="nop_name2" name="nop_name2" class="form-control" value="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">อุณหภูมิ : </label>
                        <input type="text" id="nop_temperature2" name="nop_temperature2" class="form-control" value="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">ข้อความ : </label>
                        <input type="text" id="nop_text2" name="nop_text2" class="form-control" value="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">เลือกวีดีโอ : </label>
                        <input type="file" id="video2" name="video2">
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
        <h1 class="mt-4">จัดการข้อความเตือนคนไข้</h1>
    </div>
    <!-- add_hospital -->
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                แบบฟอร์มเพิ่มข้อมูลข้อความเตือนคนไข้
                <div class="card-body">
                    <form method="POST" action="{{ url('add_notipatient') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <!-- <div class="col-sm-12"> -->

                            <label for="nop_name"
                                class="col-sm-1 col-form-label text-md-right">{{ __('ชื่อข้อความ : ') }}</label>
                            <div class="col-sm-3">
                                <input id="nop_name" value=""
                                    class="form-control @error('nop_name') is-invalid @enderror" name="nop_name"
                                    required autocomplete="nop_name">
                            </div>
                            <label for="nop_temperature"
                                class="col-sm-1 col-form-label text-md-right">{{ __('อุณหภูมิ : ') }}</label>
                            <div class="col-sm-1">
                                <input id="nop_temperature" value=""
                                    class="form-control @error('nop_temperature') is-invalid @enderror"
                                    name="nop_temperature" required autocomplete="nop_temperature">
                            </div>
                            <label for="nop_text"
                                class="col-sm-1 col-form-label text-md-right">{{ __('ข้อความ : ') }}</label>
                            <div class="col-sm-1">
                                <input id="nop_text" value=""
                                    class="form-control @error('nop_text') is-invalid @enderror" name="nop_text"
                                    required autocomplete="nop_text">
                            </div>
                            <label class="col-sm-1 col-form-label text-md-right">เลือกวีดีโอ : </label>
                            <div class="col-sm-1">
                                <input type="file" id="video" name="video">
                            </div>
                            <!-- </div> -->
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" style="float: right;">
                                    {{ __('เพิ่มข้อมูล') }}
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
            ตารางข้อมูลข้อความเตือนคนไข้
            <!-- <a href="{{ url('/addpatient') }}" class="btn btn-primary " style="float: right;">เพิ่มข้อมูลข้อความเตือนคนไข้</a> -->
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th style="text-align: center;">ลำดับ</th>
                        <th style="text-align: center;">ชื่อแจ้งเตือน</th>
                        <th style="text-align: center;">อุณหภูมิ</th>
                        <th style="text-align: center;">ข้อความ</th>
                        <th style="text-align: center;">วีดีโอ</th>
                        <th style="text-align: center;">แก้ไข</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th style="text-align: center;">ลำดับ</th>
                        <th style="text-align: center;">ชื่อแจ้งเตือน</th>
                        <th style="text-align: center;">อุณหภูมิ</th>
                        <th style="text-align: center;">ข้อความ</th>
                        <th style="text-align: center;">วีดีโอ</th>
                        <th style="text-align: center;">แก้ไข</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php($i=1)
                    @foreach($nop as $row)
                    <tr>
                        <td style="text-align: center;">{{$i}}</td>
                        <td style="text-align: center;">{{$row->nop_name}}</td>
                        <td style="text-align: center;">{{$row->nop_temperature}}</td>
                        <td style="text-align: center;">{{$row->nop_text}}</td>
                        <td style="text-align: center;"><video width="280" height="200" controls>
                                <source src="{{ url($row->nop_video) }}" type="video/mp4" preload="auto">
                                Your browser does not support the video tag.
                            </video></td>
                        <td style="text-align: center;">
                            <button  class="btn btn-success open_modal" value="{{$row->nop_id}}">แก้ไข</button>
                        </td>
                    </tr>
                    @php($i++)
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
@endsection

@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

<script>
// Edit
$(document).ready(function() {

    $('#editnotipatient').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/edit_notipatient",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(response) {
                console.log(response);
                
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
    var url = "{!!URL::to('findnop_id')!!}";
    var nop_id = $(this).val();
    $.get(url + '/' + nop_id, function(data) {
        //success data
        // console.log(data);
        $('#nop_id').val(data[0].nop_id);
        $('#nop_name2').val(data[0].nop_name);
        $('#nop_temperature2').val(data[0].nop_temperature);
        $('#nop_text2').val(data[0].nop_text);
        $('#issueslistModal').modal('show');
    })
});
</script>
@endsection
