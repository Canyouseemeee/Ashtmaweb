@extends('layouts.master')

@section('title','Dashboard')
@section('content')

<!-- Modal Create Medicine -->
<div class="modal fade" id="issueslistModalCreate" name="issueslistModalCreate" tabindex="-1" role="dialog"
    aria-labelledby="issuesModalLabelCreate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="issuesModalLabelCreate">เพิ่มข้อมูลยา</h5>
            </div>
            <form id="addmedicine" >
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">ชื่อยา : </label>
                        <input type="text" id="me_name" name="me_name" class="form-control" value="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">ขนาดยา : </label>
                        <input type="text" id="me_dose" name="me_dose" class="form-control" value="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">ครั้งละ : </label>
                        <input type="text" id="me_time" name="me_time" class="form-control" value="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">วันละ : </label>
                        <input type="text" id="me_day" name="me_day" class="form-control" value="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">ช่วง : </label>
                        <input type="checkbox" id="me_when0" name="me_when0">
                        <label for="">เช้า</label>
                        <input type="checkbox" id="me_when1" name="me_when1">
                        <label for="">เย็น</label>
                    </div>
                    <br>
                    <div class="form-group ">
                        <label for="Image" class="col-sm-1 col-form-label text-md-right">{{ __('รูปยา : ') }}</label>
                        <div class="col-md-3">
                            <input type="file" id="Image" name="Image">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="me_type">ประเภทยา : </label>
                        <div class="col-md-6">
                            <select id="me_type" name="me_type" class="form-control">
                                <option value="0">ยาพ่นปกติ</option>
                                <option value="1">ยาพ่นเมื่อมีอาการจับหืดเฉียบพลัน</option>
                                <option value="2">ยาฉุกเฉิน</option>
                                <option value="3">ยาพ่นบรรเทาอาการ</option>
                            </select>
                        </div>
                    </div>
                    <div id="result">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="modaladdmeclosed" class="btn btn-secondary"
                        data-dismiss="modal">ปิด</button>
                    <button type="submit" id="submitadd" name="submitadd" value="Submit"
                        class="btn btn-primary">เพิ่มข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Edit Medicine -->
<div class="modal fade" id="issueslistModal" name="issueslistModal" tabindex="-1" role="dialog"
    aria-labelledby="issuesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="issuesModalLabel">แก้ไขข้อมูลยา</h5>
                <!-- <button type="button" id="modalhptclosed" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button> -->
            </div>
            <!-- <form action="{{ url('/appointment-add') }}" method="post"> -->
            <form id="editmedicines" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input id="me_e_id" value="" class="form-control @error('me_e_id') is-invalid @enderror" name="me_e_id"
                        required autocomplete="me_e_id" hidden="true">
                        <div class="form-group">
                        <label for="">ชื่อยา : </label>
                        <input type="text" id="me_e_name" name="me_e_name" class="form-control" value="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">ขนาดยา : </label>
                        <input type="text" id="me_e_dose" name="me_e_dose" class="form-control" value="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">ครั้งละ : </label>
                        <input type="text" id="me_e_time" name="me_e_time" class="form-control" value="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">วันละ : </label>
                        <input type="text" id="me_e_day" name="me_e_day" class="form-control" value="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">ช่วง : </label>
                        <input type="checkbox" id="me_e_when0" name="me_e_when0" >
                        <label for="">เช้า</label>
                        <input type="checkbox" id="me_e_when1" name="me_e_when1" >
                        <label for="">เย็น</label>
                    </div>
                    <br>
                    <div class="form-group ">
                        <label for="Image_e" class="col-sm-1 col-form-label text-md-right">{{ __('รูปยา : ') }}</label>
                        <div class="col-md-3">
                            <input type="file" id="Image_e" name="Image_e">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="me_e_type">ประเภทยา : </label>
                        <div class="col-md-6">
                            <select id="me_e_type" name="me_e_type" class="form-control">
                                <option value="0">ยาพ่นปกติ</option>
                                <option value="1">ยาพ่นเมื่อมีอาการจับหืดเฉียบพลัน</option>
                                <option value="2">ยาฉุกเฉิน</option>
                                <option value="3">ยาพ่นบรรเทาอาการ</option>
                            </select>
                        </div>
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
        <h1 class="mt-4">จัดการข้อมูลยา</h1>
    </div>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            ตารางข้อมูลยา
            <button class="btn btn-primary" style="float: right;" data-toggle="modal"
                data-target="#issueslistModalCreate">เพิ่มข้อมูลยา</button>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th style="text-align: center;">ลำดับ</th>
                        <th style="text-align: center;">รูป</th>
                        <th style="text-align: center;">ยา</th>
                        <th style="text-align: center;">ขนาดยา</th>
                        <th style="text-align: center;">ครั้งละ</th>
                        <th style="text-align: center;">วันละ</th>
                        <th style="text-align: center;">ช่วง</th>
                        <th style="text-align: center;">ประเภทยา</th>
                        <th style="text-align: center;">แก้ไข</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th style="text-align: center;">ลำดับ</th>
                        <th style="text-align: center;">รูป</th>
                        <th style="text-align: center;">ยา</th>
                        <th style="text-align: center;">ขนาดยา</th>
                        <th style="text-align: center;">ครั้งละ</th>
                        <th style="text-align: center;">วันละ</th>
                        <th style="text-align: center;">ช่วง</th>
                        <th style="text-align: center;">ประเภทยา</th>
                        <th style="text-align: center;">แก้ไข</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php($i=1)
                    @foreach($medicine as $row)
                    <tr>
                        <td style="text-align: center;">{{$i}}</td>
                        @if($row->me_image === null)
                            <td style="text-align: center;"><img src="{{ url('assets/profile.png') }}" alt="image" width="80" height="80"></td>
                        @else
                            <td style="text-align: center;"><img src="{{ url('storage/'.$row->me_image) }}" alt="image" width="80" height="80"></td>
                        @endif
                        <td style="text-align: center;">{{$row->me_name}}</td>
                        <td style="text-align: center;">{{$row->me_dose}}</td>
                        <td style="text-align: center;">{{$row->me_time}}</td>
                        <td style="text-align: center;">{{$row->me_day}}</td>
                        @if($row->me_when === 0)
                        <td style="text-align: center;">เช้า</td>
                        @elseif($row->me_when === 1)
                        <td style="text-align: center;">เย็น</td>
                        @elseif($row->me_when === 2)
                        <td style="text-align: center;">เช้า-เย็น</td>
                        @endif
                        @if($row->me_type === 0)
                        <td style="text-align: center;">ยาพ่นปกติ</td>
                        @elseif($row->me_type === 1)
                        <td style="text-align: center;">ยาพ่นเมื่อมีอาการจับหืดเฉียบพลัน</td>
                        @elseif($row->me_type === 2)
                        <td style="text-align: center;">ยาฉุกเฉิน</td>
                        @elseif($row->me_type === 3)
                        <td style="text-align: center;">ยาพ่นบรรเทาอาการ</td>
                        @endif
                        <td style="text-align: center;">
                            <button class="btn btn-success open_modal" value="{{$row->me_id}}">แก้ไข</button>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
<script>
$(document).ready(function() {

    $('#addmedicine').on('submit', function(e) {
        e.preventDefault();
        // console.log($(this).serialize());
        var me_name = $("#me_name").val();
        var me_dose = $("#me_dose").val();
        var me_time = $("#me_time").val();
        var me_day = $("#me_day").val();
        var me_when0 = $("#me_when0").val();
        var me_when1 = $("#me_when1").val();
        var me_type = $("#me_type").val();
        var Image = $("#Image").val();
        var formData = new FormData($(this)[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "POST",
            url: "/add_medicine",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(response) {
                console.log(response);
                // $("#result").html(
                //     '<div class="alert alert-success" role="alert" id="result">อัพเดทสำเร็จ</div>'
                // );
                $('#issueslistModalCreate').modal('hide');
                window.location.reload(true);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $('#modaladdmeclosed').click(function() {
        $('#issueslistModalCreate').modal('hide');
    });
});

// Edit
$(document).ready(function() {

    $('#editmedicines').on('submit', function(e) {
        e.preventDefault();
        // console.log($(this).serialize());
        var h_id = $("#h_id").val();
        var h_name2 = $("#h_name2").val();
        var h_tel2 = $("#h_tel2").val();
        var formData = new FormData($(this)[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/edit_medicine",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(response) {
                console.log(response);
                // $("#result").html(
                //     '<div class="alert alert-success" role="alert" id="result">อัพเดทสำเร็จ</div>'
                // );
                $('#issueslistModal').modal('hide');
                document.getElementById("me_e_when0").checked = false;
                document.getElementById("me_e_when1").checked = false;
                window.location.reload(true);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $('#modalhptclosed').click(function() {
        $('#issueslistModal').modal('hide');
        document.getElementById("me_e_when0").checked = false;
        document.getElementById("me_e_when1").checked = false;
    });
});

$(document).on('click', '.open_modal', function() {
    var url = "{!!URL::to('findme_id')!!}";
    var me_id = $(this).val();
    $.get(url + '/' + me_id, function(data) {
        //success data
        // console.log(data);
        $('#me_e_id').val(data[0].me_id);
        $('#me_e_name').val(data[0].me_name);
        $('#me_e_dose').val(data[0].me_dose);
        $('#me_e_time').val(data[0].me_time);
        $('#me_e_day').val(data[0].me_day);
        if(data[0].me_when == 0 ){
            document.getElementById("me_e_when0").checked = true;
        }else if(data[0].me_when == 1){
            document.getElementById("me_e_when1").checked = true;
        }else if(data[0].me_when == 2){
            document.getElementById("me_e_when0").checked = true;
            document.getElementById("me_e_when1").checked = true;
        }
        // $('#me_e_when').val(data[0].me_when);
        $('#me_e_type').val(data[0].me_type);
        // $('#details').val(data.details);
        // $('#btn-save').val("update");
        $('#issueslistModal').modal('show');
    })
});
</script>

@endsection