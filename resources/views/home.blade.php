@extends('layouts.default')
<?php
$success=Session::get('success');
$error=Session::get('error');
?>
@section('stylesheet')
    <link href="{{ URL::asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::asset('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/vendors/build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('/css/header.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/w3.css') }}">
@endsection

@section('content')
    <br/>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if($success!=null)<div align="center" ><h4>{{$success}}</h4></div>@endif
                @if($error!=null)<div align="center" ><h4>{{$error}}</h4></div>@endif
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are loggin
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
