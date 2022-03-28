@extends('layouts.master')

@section('title','Dashboard')
@section('content')
<div class="container-fluid px-4">
    <div class="col">
        <h1 class="mt-4">แก้ไขข้อมูลผู้ป่วย</h1>
    </div>
    <div class="container">
        <div class="col justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('แบบฟอร์ม') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/edit_patient/{{ $patient->hn_id }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <br>
                            <div class="form-group row">
                                <label for="tname" class="col-sm-1 col-form-label text-md-right">{{ __('ชื่อ :') }}</label>

                                <div class="col-sm-1">
                                    <select name="tname" class="form-control">
                                        <option value="0" @if($patient->p_tname === 0)selected @endif>นาย</option>
                                        <option value="1" @if($patient->p_tname === 1)selected @endif>นางสาว</option>
                                        <option value="2" @if($patient->p_tname === 2)selected @endif>นาง</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $patient->p_name }}" required autocomplete="name">
                                </div>

                                <label for="surname" class="col-sm-2 col-form-label text-md-right">{{ __('นามสกุล :') }}</label>

                                <div class="col-md-3">
                                    <input id="surname" type="surname" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $patient->p_surname }}" required autocomplete="surname">

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
                                        <option value="0" @if($patient->p_etname === 0)selected @endif>Mr.</option>
                                        <option value="1" @if($patient->p_etname === 1)selected @endif>Mrs.</option>
                                        <option value="2" @if($patient->p_etname === 2)selected @endif>Miss</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input id="ename" type="ename" class="form-control @error('ename') is-invalid @enderror" name="ename" value="{{ $patient->p_ename }}" required autocomplete="ename">
                                </div>

                                <label for="esurname" class="col-sm-2 col-form-label text-md-right">{{ __('นามสกุลภาษาอังกฤษ  :') }}</label>

                                <div class="col-md-3">
                                    <input id="esurname" type="esurname" class="form-control @error('esurname') is-invalid @enderror" name="esurname" value="{{ $patient->p_esurname }}" required autocomplete="esurname">

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
                                        <option value="0" @if($patient->p_gender === 0)selected @endif>ชาย</option>
                                        <option value="1" @if($patient->p_gender === 1)selected @endif>หญิง</option>
                                    </select>
                                </div>
                                <label class="col-sm-1 col-form-label text-md-right"> วัน\เดือน\ปี เกิด : </label>

                                <div class="form-group col-sm-2 mb-2">
                                    
                                    <input type="date" id="birthdate" name="birthdate" value="{{$patient->p_birthdate}}" class="form-control">
                                </div>

                                <label for="tel" class="col-sm-1 col-form-label text-md-right">{{ __('เบอร์ติดต่อ : ') }}</label>
                                <div class="col-sm-2">
                                    <input id="tel" value="{{$patient->p_tel}}" class="form-control @error('tel') is-invalid @enderror" name="tel" required autocomplete="tel">

                                    @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="race" class="col-sm-1 col-form-label text-md-right">{{ __('เชื้อชาติ : ') }}</label>
                                <div class="col-sm-1">
                                    <input id="race" value="{{$patient->p_race}}" class="form-control @error('race') is-invalid @enderror" name="race" required autocomplete="race">

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
                                    <input id="nationality" value="{{$patient->p_nationality}}" class="form-control @error('nationality') is-invalid @enderror" name="nationality" required autocomplete="nationality">

                                    @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="religion" class="col-sm-1 col-form-label text-md-right">{{ __('ศาสนา : ') }}</label>
                                <div class="col-sm-1">
                                    <input id="religion" value="{{$patient->p_religion}}" class="form-control @error('religion') is-invalid @enderror" name="religion" required autocomplete="religion">

                                    @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="weight" class="col-sm-1 col-form-label text-md-right">{{ __('น้ำหนัก : ') }}</label>
                                <div class="col-sm-1">
                                    <input id="weight" value="{{$patient->p_weight}}" class="form-control @error('weight') is-invalid @enderror" name="weight" required autocomplete="weight">

                                    @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="height" class="col-sm-1 col-form-label text-md-right">{{ __('ส่วนสูง : ') }}</label>
                                <div class="col-sm-1">
                                    <input id="height" value="{{$patient->p_height}}" class="form-control @error('height') is-invalid @enderror" name="height" required autocomplete="height">

                                    @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="Image" class="col-sm-1 col-form-label text-md-right">{{ __('รูปโปรไฟล์') }}</label>
                                <div class="col-md-3">
                                    <input type="file" id="Image" name="Image">
                                    <p>*ไม่จำเป็นต้องใส่ถ้าใช้รูปเดิม</p>
                                </div>
                                
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="d_id" class="col-sm-1 col-form-label text-md-right">โรค : </label>
                                <div class="col-md-2">
                                    <select name="d_id" class="form-control">
                                        @foreach($find as $find1)
                                        @foreach($disease as $row)
                                            <option value="{{$row->d_id}}" @if ($row->d_name === $find1->d_name)
                                        selected
                                        @endif>{{$row->d_name}}</option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <label for="sysptom" class="col-sm-1 col-form-label text-md-right">อาการ : </label>
                                <div class="col-md-2">
                                    <input id="sysptom" value="{{$patient->p_sysptom}}" class="form-control @error('sysptom') is-invalid @enderror" name="sysptom" required autocomplete="sysptom">
                                </div>

                                <!-- <label for="passwordcode" class="col-sm-1 col-form-label text-md-right">รหัสเข้าถึง : </label>
                                <div class="col-md-2">
                                    <input id="passwordcode" type="password" class="form-control @error('passwordcode') is-invalid @enderror" name="passwordcode" required autocomplete="passwordcode">
                                </div> -->
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="address" class="col-sm-1 col-form-label text-md-right">ที่อยู่ : </label>
                                <div class="col-md-6">
                                    <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address">{{$patient->p_address}}</textarea >
                                </div>
                            </div>
                            
                            <br>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="h_id" class="col-form-label text-md-right">โรงพยาบาล :</label>
                                    <select name="h_id" class="form-control">
                                        @foreach($find as $find1)
                                        @foreach($hpt as $row)
                                            <option value="{{$row->h_id}}" @if ($row->h_name === $find1->h_name)
                                            selected
                                            @endif>{{$row->h_name}}</option>
                                        @endforeach
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

@endsection
