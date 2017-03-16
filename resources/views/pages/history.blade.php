@extends('layouts.default')
<?php
$success=Session::get('success');
$error=Session::get('error');
?>
@section('title')
    Recent Memo
@endsection
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
                    <div align="center" class="panel-heading"><h3>Recent Memos</h3></div>

                    <div class="panel-body">

                        @if(sizeof($history)>0)
                            <?php $count=0;?>
                            @foreach($history as $item)
                                @if($count!=0)
                                    <hr>@endif
                                <div class="row">
                                    <div align="right" class="w3-text-blue"><h4> {{$item->date}}</h4></div>
                                    <div align="left" class="col-md-8 w3-text-blue">
                                        <h5><u>Customer Name</u> :  {{$item->customer_name}} </h5>
                                        <h5><u>Customer Phone</u> :  {{$item->phone_no}}</h5>
                                        <h5><u>Customer Address</u> :  {{$item->address}}</h5>
                                        <h5><u>Total Amount</u> :  {{$item->total_price}} BDT.</h5>
                                        <h5><u>Paid Amount</u> :  {{$item->paid_amount}} BDT.</h5>
                                        <h5><u>Purchased Medicine</u> :  {{$item->item_list}}</h5>
                                    </div>
                                </div>
                                    <?php $count++;?>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
