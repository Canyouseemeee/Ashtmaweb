@extends('layouts.master')

@section('title','Dashboard')
@section('content')
<div class="container-fluid px-4">
    <div class="column">
        <h1 class="mt-4">จัดการข้อมูลผู้ป่วย</h1>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
                ตารางข้อมูลผู้ป่วย
            <a href="{{ url('/addpatient') }}" class="btn btn-primary " style="float: right;">เพิ่มข้อมูลผู้ป่วย</a>
        </div>
        <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th style="text-align: center;">HN</th>
                    <th style="text-align: center;">ชื่อ - สกุล</th>
                    <th style="text-align: center;">โรค</th>
                    <th style="text-align: center;">สถานะ</th>
                    <th style="text-align: center;">โรงพยาบาล</th>
                    <th style="text-align: center;">ดูข้อมูล</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                    <th style="text-align: center;">HN</th>
                    <th style="text-align: center;">ชื่อ - สกุล</th>
                    <th style="text-align: center;">โรค</th>
                    <th style="text-align: center;">สถานะ</th>
                    <th style="text-align: center;">โรงพยาบาล</th>
                    <th style="text-align: center;">ดูข้อมูล</th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($patient as $row)
                    <tr>
                        <td style="text-align: center;">{{$row->hn_id}}</td>
                        @if($row->p_tname === 0)
                            <td style="text-align: center;">นาย{{$row->p_name}} {{$row->p_surname}}</td>
                        @elseif($row->p_tname === 1)
                            <td style="text-align: center;">นาง{{$row->p_name}} {{$row->p_surname}}</td>
                        @elseif($row->p_tname === 2)
                            <td style="text-align: center;">นางสาว{{$row->p_name}} {{$row->p_surname}}</td>
                        @endif
                        <td style="text-align: center;">{{$row->d_name}}</td>
                        @if($row->p_status === 0)
                            <td style="text-align: center;">รักษาตัวอยู่</td>
                        @elseif($row->p_status === 1)
                            <td style="text-align: center;">อันตราย</td>
                        @endif
                        <td style="text-align: center;">{{$row->h_name}}</td>
                        <td style="text-align: center;">
                            <a href="/viewpatient/{{$row->hn_id}}" class="btn btn-success">ดูข้อมูล</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
@endsection
