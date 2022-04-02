@extends('layouts.master')

@section('title','Dashboard')
@section('content')
<div class="container-fluid px-4">
    <div class="col">
        <h1 class="mt-4">เพิ่มข้อมูลผู้ป่วย</h1>
    </div>
    <div class="container">
        <div class="col justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('แบบฟอร์ม') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('add_patient') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <br>
                            <div class="form-group row">
                                <label for="tname" class="col-sm-1 col-form-label text-md-right">{{ __('ชื่อ :') }}</label>

                                <div class="col-sm-1">
                                    <select name="tname" class="form-control">
                                        <option value="0">นาย</option>
                                        <option value="1">นางสาว</option>
                                        <option value="2">นาง</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                                </div>

                                <label for="surname" class="col-sm-2 col-form-label text-md-right">{{ __('นามสกุล :') }}</label>

                                <div class="col-md-3">
                                    <input id="surname" type="surname" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname">

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="etname" class="col-sm-1 col-form-label text-md-right">{{ __('ชื่อภาษาอังกฤษ :') }}</label>

                                <div class="col-sm-1">
                                    <select name="etname" class="form-control">
                                        <option value="0">Mr.</option>
                                        <option value="1">Mrs.</option>
                                        <option value="2">Miss</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input id="ename" type="ename" class="form-control @error('ename') is-invalid @enderror" name="ename" value="{{ old('ename') }}" required autocomplete="ename">
                                </div>

                                <label for="esurname" class="col-sm-2 col-form-label text-md-right">{{ __('นามสกุลภาษาอังกฤษ  :') }}</label>

                                <div class="col-md-3">
                                    <input id="esurname" type="esurname" class="form-control @error('esurname') is-invalid @enderror" name="esurname" value="{{ old('esurname') }}" required autocomplete="esurname">

                                    @error('esurname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="gender" class="col-sm-1 col-form-label text-md-right">{{ __('เพศ : ') }}</label>
                                <div class="col-sm-1">
                                    <select name="gender" class="form-control">
                                        <option value="0">ชาย</option>
                                        <option value="1">หญิง</option>
                                    </select>
                                </div>
                                <label class="col-sm-1 col-form-label text-md-right"> วัน\เดือน\ปี เกิด : </label>

                                <div class="form-group col-sm-2 mb-2">
                                    
                                    <input type="date" id="birthdate" name="birthdate" value="{{now()->toDateString()}}" class="form-control">
                                </div>

                                <label for="tel" class="col-sm-1 col-form-label text-md-right">{{ __('เบอร์ติดต่อ : ') }}</label>
                                <div class="col-sm-2">
                                    <input id="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" required autocomplete="tel">

                                    @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="race" class="col-sm-1 col-form-label text-md-right">{{ __('เชื้อชาติ : ') }}</label>
                                <div class="col-sm-1">
                                    <input id="race" class="form-control @error('race') is-invalid @enderror" name="race" required autocomplete="race">

                                    @error('race')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="nationality" class="col-sm-1 col-form-label text-md-right">{{ __('สัญชาติ : ') }}</label>
                                <div class="col-sm-1">
                                    <input id="nationality" class="form-control @error('nationality') is-invalid @enderror" name="nationality" required autocomplete="nationality">

                                    @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="religion" class="col-sm-1 col-form-label text-md-right">{{ __('ศาสนา : ') }}</label>
                                <div class="col-sm-1">
                                    <input id="religion" class="form-control @error('religion') is-invalid @enderror" name="religion" required autocomplete="religion">

                                    @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="weight" class="col-sm-1 col-form-label text-md-right">{{ __('น้ำหนัก : ') }}</label>
                                <div class="col-sm-1">
                                    <input id="weight" class="form-control @error('weight') is-invalid @enderror" name="weight" required autocomplete="weight">

                                    @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="height" class="col-sm-1 col-form-label text-md-right">{{ __('ส่วนสูง : ') }}</label>
                                <div class="col-sm-1">
                                    <input id="height" class="form-control @error('height') is-invalid @enderror" name="height" required autocomplete="height">

                                    @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="Image" class="col-sm-1 col-form-label text-md-right">{{ __('รูปโปรไฟล์') }}</label>
                                <div class="col-md-3">
                                    <input type="file" id="Image" name="Image">
                                </div>
                                
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="d_id" class="col-sm-1 col-form-label text-md-right">โรค : </label>
                                <div class="col-md-2">
                                    <select name="d_id" class="form-control">
                                        @foreach($disease as $row)
                                            <option value="{{$row->d_id}}">{{$row->d_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="sysptom" class="col-sm-1 col-form-label text-md-right">อาการ : </label>
                                <div class="col-md-2">
                                    <input id="sysptom" class="form-control @error('sysptom') is-invalid @enderror" name="sysptom" required autocomplete="sysptom">
                                </div>

                                <label for="passwordcode" class="col-sm-1 col-form-label text-md-right">รหัสเข้าถึง : </label>
                                <div class="col-md-2">
                                    <input id="passwordcode" type="password" class="form-control @error('passwordcode') is-invalid @enderror" name="passwordcode" required autocomplete="passwordcode">
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="address" class="col-sm-1 col-form-label text-md-right">ที่อยู่ : </label>
                                <div class="col-md-6">
                                    <textarea  id="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address"></textarea >
                                </div>
                            </div>
                            
                            <br>
                            <div class="form-group row">
                                <label for="me_id" class="col-sm-1 col-form-label text-md-right">ยา:</label>
                                <div class="col-md-3">
                                    <select name="me_id" class="form-control">
                                    @foreach($medicine as $row)
                                        <option  value="{{$row->me_id}}">{{$row->me_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <label for="h_id" class="col-sm-1 col-form-label text-md-right">โรงพยาบาล:</label>
                                <div class="col-md-6">
                                    <select name="h_id" class="form-control">
                                    @foreach($hpt as $row)
                                        <option value="{{$row->h_id}}">{{$row->h_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            
                            <br>
                            <div class="form-group row">
                                <div class="col-md-3 ">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ยืนยัน') }}
                                    </button>
                                    <a href="/patient" class="btn btn-danger">ยกเลิก</a>
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
