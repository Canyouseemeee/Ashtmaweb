@extends('layouts.master')

@section('title','Dashboard')
@section('content')
<div class="container-fluid px-4">
    <div class="col">
        <h1 class="mt-4">แก้ไขข้อมูลผู้ใช้</h1>
    </div>
    <div class="container">
        <div class="col justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('แบบฟอร์ม') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/update_user/{{ $medic->m_id }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <!-- <div class="form-group row">
                                <label for="m_id" class="col-md-1 col-form-label text-md-right">{{ __('ไอดีผู้ใช้ :') }}</label>
                                <div class="col-md-3">
                                    <input id="m_id" type="text" class="form-control @error('m_id') is-invalid @enderror" name="m_id" value="{{ old('m_id') }}" required autocomplete="m_id" autofocus>

                                    @error('m_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> -->
                            <br>
                            <div class="form-group row">
                                <label for="fullname" class="col-sm-1 col-form-label text-md-right">{{ __('ชื่อ-สกุล :') }}</label>

                                <!-- <div class="col-sm-1">
                                    <select name="pname" class="form-control">
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                        <option value="นาง">นาง</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Str::substr($medic->m_fullname,0,3)}}" required autocomplete="name">
                                </div>

                                <label for="surname" class="col-sm-1 col-form-label text-md-right">{{ __('สกุล :') }}</label> -->

                                <div class="col-md-3">
                                    <input id="fullname" type="fullname" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ ($medic->m_fullname) }}" required autocomplete="fullname">

                                    @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <!-- <div class="form-group row">
                                <label for="password" class="col-sm-1 col-form-label text-md-right">{{ __('รหัสผ่าน : ') }}</label>

                                <div class="col-md-3">
                                    <input id="password" type="password" value="{{ $medic->password }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br> -->

                            <!-- <div class="form-group row">
                                <label for="password-confirm" class="col-sm-1 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน : ') }}</label>

                                <div class="col-md-3">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div> -->

                            <div class="form-group row">
                            <label for="Image" class="col-sm-1 col-form-label text-md-right">{{ __('รูปโปรไฟล์') }}</label>
                                <div class="col-md-3">
                                    <img src="{{ url('storage/'.$medic->m_image) }}" alt="image" width="80" height="80">

                                    <input type="file" id="Image" name="Image">
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="m_position" class="col-sm-1 col-form-label text-md-right">ตำแหน่ง : </label>
                                <div class="col-md-6">
                                    <select name="m_position" class="form-control">
                                        <option value="0" @if ($medic->m_position === 0)
                                                selected
                                                @endif>พยาบาล</option>
                                        <option value="1" @if ($medic->m_position === 1)
                                                selected
                                                @endif>หมอ</option>
                                        <option value="2" @if ($medic->m_position === 2)
                                                selected
                                                @endif>เจ้าหน้าที่</option>
                                    </select>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="h_id" class="col-sm-1 col-form-label text-md-right">โรงพยาบาล : </label>
                                <div class="col-md-6">
                                    <select name="h_id" class="form-control">
                                    @foreach($find as $find1)
                                    @foreach($hpt as $row)
                                        <option value="{{$row->h_id}}" @if ($row->h_name === $find1->h_name)
                                        selected
                                        @endif >{{$row->h_name}}</option>
                                    @endforeach
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label text-md-right"> วัน\เดือน\ปี เริ่มงาน : </label>
                                <div class="col-xl-4 col-md-6 mb-2">
                                    <input type="text" id="fromdate" name="fromdate" value="{{$medic->m_startdate}}" class="form-control">
                                </div>
                                <label class="col-sm-1 col-form-label text-md-right"> วัน\เดือน\ปี สิ้นสุดงาน : </label>
                                <div class="col-xl-4 col-md-6 mb-2">
                                    <input type="text" id="todate" name="todate" value="{{$medic->m_enddate}}" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-3 ">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ยืนยัน') }}
                                    </button>
                                    <a href="/usermanagement" class="btn btn-danger">ยกเลิก</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
  $(function() {
    var from = $('#fromdate').datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true
      }).on("change", function() {
        to.datepicker("option", "minDate", getDate(this));
      }),
      to = $('#todate').datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true
      }).on("change", function() {
        from.datepicker("option", "maxDate", getDate(this));
      });

    function getDate(element) {
      var date;
      var dateFormat = "yy-mm-dd";
      try {
        date = $.datepicker.parseDate(dateFormat, element.value);
      } catch (error) {
        date = null;
      }
      return date;
    }
  });
</script>
@endsection
