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
                            <div style="display:flex;justify-content:center;">
                                <div class="form-group row" style="display:flex;justify-content:center;">
                                    <img style="border-right:solid 2px #dddddd;border-top:solid 2px #dddddd;border-left:solid 2px #dddddd;
                                    border-bottom:solid 2px #dddddd;" 
                                    src="{{ url('storage/'.$patient->p_image) }}" alt="image" width="120" height="120">
                                    <div class="col-sm-12" style="display:flex;justify-content:center;">
                                        <label for="tname" class=" col-form-label text-md-right">{{ __('HN :') }}</label>
                                        <label for="tname" class=" col-form-label text-md-right">{{ $patient->hn_id }}</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="tname" class=" col-form-label text-md-right">{{ __('ชื่อ-นามสกุล :') }}</label>
                                    &emsp;
                                    @if($patient->p_tname === 0)
                                        <label for="tname" class=" col-form-label text-md-right">นาย</label>
                                    @elseif($patient->p_tname === 1)
                                        <label for="tname" class=" col-form-label text-md-right">นางสาว</label>
                                    @elseif($patient->p_tname === 2)
                                        <label for="tname" class=" col-form-label text-md-right">นาง</label>
                                    @endif
                                    <label for="tname" class=" col-form-label text-md-right">{{ $patient->p_name }}</label>
                                    <label for="tname" class=" col-form-label text-md-right">{{ $patient->p_surname }}</label>
                                    <?php
                                        echo "\n";
                                    ?>
                                    <label for="etname" class=" col-form-label text-md-right">&emsp;&emsp;&emsp;&emsp;
                                    {{ __('ชื่อ-นามสกุลภาษาอังกฤษ :') }}</label>
                                    &emsp;
                                    @if($patient->p_etname === 0)
                                        <label for="tname" class=" col-form-label text-md-right">Mr.</label>
                                    @elseif($patient->p_etname === 1)
                                        <label for="tname" class=" col-form-label text-md-right">Mrs.</label>
                                    @elseif($patient->p_etname === 2)
                                        <label for="tname" class=" col-form-label text-md-right">Miss</label>
                                    @endif
                                    <label for="tname" class=" col-form-label text-md-right">{{ $patient->p_ename }}</label>
                                    <label for="tname" class=" col-form-label text-md-right">{{ $patient->p_esurname }}</label>

                                    &emsp;&emsp;&emsp;
                                    <label for="tname" class=" col-form-label text-md-right">{{ __('เพศ :') }}</label>
                                    @if($patient->p_gender === 0)
                                        <label for="tname" class=" col-form-label text-md-right">ชาย</label>
                                    @elseif($patient->p_gender === 1)
                                        <label for="tname" class=" col-form-label text-md-right">หญิง</label>
                                    @endif

                                    &emsp;&emsp;&emsp;
                                    <label class="col-sm-1 col-form-label text-md-right"> วัน\เดือน\ปี เกิด : </label>
                                    <label for="tname" class=" col-form-label text-md-right">{{ $patient->p_birthdate }}</label>


                                    &emsp;&emsp;&emsp;
                                    <label for="tel" class=" col-form-label text-md-right">{{ __('เบอร์ติดต่อ : ') }}</label>
                                    <label for="tname" class=" col-form-label text-md-right">{{ $patient->p_tel }}</label>

                                </div>

                            </div>
                            
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="race" class=" col-form-label text-md-right">{{ __('เชื้อชาติ : ') }}</label>
                                    <label for="race" class=" col-form-label text-md-right">{{ $patient->p_race }}</label>
                                    &emsp;&emsp;&emsp;
                                    <label for="nationality" class=" col-form-label text-md-right">{{ __('สัญชาติ : ') }}</label>
                                    <label for="nationality" class=" col-form-label text-md-right">{{ $patient->p_nationality }}</label>
                                    &emsp;&emsp;&emsp;                                   
                                    <label for="religion" class="col-form-label text-md-right">{{ __('ศาสนา : ') }}</label>
                                    <label for="religion" class="col-form-label text-md-right">{{ $patient->p_religion }}</label>
                                    &emsp;&emsp;&emsp;                                   
                                    <label for="weight" class=" col-form-label text-md-right">{{ __('น้ำหนัก : ') }}</label>
                                    <label for="weight" class=" col-form-label text-md-right">{{ $patient->p_weight }}</label>
                                    &emsp;&emsp;&emsp;                                                                    
                                    <label for="height" class=" col-form-label text-md-right">{{ __('ส่วนสูง : ') }}</label>
                                    <label for="height" class=" col-form-label text-md-right">{{ $patient->p_height }}</label>                                                                
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="address" class="col-form-label text-md-right">ที่อยู่ : </label>
                                    &emsp;
                                    <label for="address" class="col-form-label text-md-right">{{ $patient->p_address }}</label>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="d_id" class=" col-form-label text-md-right">โรค : </label>
                                    @foreach($find as $find1)
                                    @foreach($disease as $row)
                                    <label for="d_id" class=" col-form-label text-md-right" @if ($row->d_name === $find1->d_name)@endif>{{ $row->d_name }}</label>
                                    @endforeach
                                    @endforeach

                                    &emsp;&emsp;&emsp;                                                                
                                    <label for="sysptom" class=" col-form-label text-md-right">อาการ : </label>
                                    <label for="sysptom" class=" col-form-label text-md-right">{{ $patient->p_sysptom }}</label>

                                    &emsp;&emsp;&emsp;                                                                
                                    <label for="passwordcode" class=" col-form-label text-md-right">ยา : </label>
                                    @foreach($medicine as $row)
                                    @if ($row->me_id === $patient->me_id)
                                        <label for="me_id" class=" col-form-label text-md-right">{{ $row->me_name }}</label>
                                    @endif
                                    @endforeach
                                                          
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="h_id" class="col-form-label text-md-right">โรงพยาบาล :</label>
                                    @foreach($hpt as $row)
                                    @if ($row->h_id === $patient->h_id)
                                        <label for="h_id" class=" col-form-label text-md-right" >{{ $row->h_name }}</label>
                                    @endif        
                                    @endforeach
                                </div>
                            </div>


                            <br>
                            <div class="form-group row">
                                <div class="col-md-3 ">
                                    <!-- <button type="submit" class="btn btn-primary">
                                        {{ __('แก้ไข') }}
                                    </button> -->
                                    <a href="/editpatient/{{$patient->hn_id}}" class="btn btn-warning">แก้ไข</a>
                                    <a href="/patient" class="btn btn-danger">กลับ</a>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
