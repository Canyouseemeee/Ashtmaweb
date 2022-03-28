@extends('layouts.master')

@section('title','Dashboard')
@section('content')
<div class="container-fluid px-4">
    <div class="column">
        <h1 class="mt-4">จัดการข้อมูลโรงพยาบาล</h1>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
                ตารางข้อมูลโรงพยาบาล
            <a href="{{ url('/addpatient') }}" class="btn btn-primary " style="float: right;">เพิ่มข้อมูลผู้ป่วย</a>
        </div>
        <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th style="text-align: center;">ลำดับ</th>
                    <th style="text-align: center;">โรงพยาบาล</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                    <th style="text-align: center;">ลำดับ</th>
                    <th style="text-align: center;">โรงพยาบาล</th>
                </tr>
                </tfoot>
                <tbody>
                    @php($i=0)
                    @foreach($hospital as $row)
                    <tr>
                        <td style="text-align: center;">{{$i}}</td>
                        <td style="text-align: center;">{{$row->h_name}}</td>
                        <td style="text-align: center;">
                            <a href="/viewpatient/{{$row->hn_id}}" class="btn btn-success">แก้ไข</a>
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
