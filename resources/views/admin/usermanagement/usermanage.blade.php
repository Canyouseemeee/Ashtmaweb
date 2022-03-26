@extends('layouts.master')

@section('title','Dashboard')
@section('content')
<div class="container-fluid px-4">
    <div class="column">
        <h1 class="mt-4">จัดการข้อมูลผู้ใช้</h1>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
                ตารางข้อมูลผู้ใช้
            <a href="{{ url('/add_usermanagement') }}" class="btn btn-primary " style="float: right;">เพิ่มข้อมูลผู้ใช้</a>
        </div>
        <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th style="text-align: center;">รูปโปรไฟล์</th>
                    <th style="text-align: center;">ไอดีผู้ใช้</th>
                    <th style="text-align: center;">ชื่อ - สกุล</th>
                    <th style="text-align: center;">ตำแหน่ง</th>
                    <th style="text-align: center;">ประเภทผู้ใช้</th>
                    <th style="text-align: center;">โรงพยาบาล</th>
                    <th style="text-align: center;">แก้ไข</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ไอดีผู้ใช้</th>
                    <th>ชื่อ - สกุล</th>
                    <th>ตำแหน่ง</th>
                    <th>ประเภทผู้ใช้</th>
                    <th>โรงพยาบาล</th>
                    <th>แก้ไข</th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($user as $row)
                    <tr>
                        @if($row->m_image === null)
                            <td><img src="{{ url('assets/profile.png') }}" alt="image" width="80" height="80"></td>
                        @else
                            <td><img src="{{ url('storage/'.$row->m_image) }}" alt="image" width="80" height="80"></td>
                        @endif
                        <td style="text-align: center;">{{$row->m_id}}</td>
                        <td style="text-align: center;">{{$row->m_fullname}}</td>
                        @if($row->m_position === 1)
                            <td style="text-align: center;">หมอ</td>
                        @elseif($row->m_position === 0)
                            <td style="text-align: center;">พยาบาล</td>
                        @elseif($row->m_position === 2)
                            <td style="text-align: center;">เจ้าหน้าที่</td>
                        @endif
                        @if($row->admin === 1)
                            <td style="text-align: center;">แอดมิน</td>
                        @elseif($row->admin === 0)
                            <td style="text-align: center;">ผู้ใช้ทั่วไป</td>
                        @endif
                        <td style="text-align: center;">{{$row->h_name}}</td>
                        <td style="text-align: center;">
                            <a href="/edit_usermanagement/{{$row->m_id}}" class="btn btn-success">แก้ไข</a>
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
