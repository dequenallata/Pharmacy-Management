@extends('layouts.default')
<?php
$success=Session::get('success');
$error=Session::get('error');
?>
@section('title')
    Memo
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
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    @if($success!=null)<div align="center" ><h4>{{$success}}</h4></div>@endif
                    @if($error!=null)<div align="center" ><h4>{{$error}}</h4></div>@endif
                    <div align="center" class="panel-heading"><h3>Create A Memo</h3></div>

                    <div class="panel-body">
                        <form class="form" method="POST" action="{{route('save.memo')}}">
                            {{ csrf_field() }}
                            <div  class="form-group">
                                <label class="control-label col-md-5 alignment">Customer Name</label>
                                <diV class="col-md-5">
                                    <input type="text" class="form-control col-md-12" name="customer_name" required="">

                                </diV>
                                <br/>
                                <br/>
                            </div>
                            <div  class="form-group">
                                <label class="control-label col-md-5 alignment">Phone No</label>
                                <diV class="col-md-5">
                                    <input type="text" class="form-control col-md-12" name="phone_no">

                                </diV>
                                <br/>
                                <br/>

                            </div>

                            <div  class="form-group">
                                <label class="control-label col-md-5 alignment">Address</label>
                                <diV class="col-md-5">
                                    <input type="text" class="form-control col-md-12"  name="address">

                                </diV>
                                <br/>
                                <br/>
                            </div>
                            <div align="center"><h4>Lists of medicine</h4></div>
                            <table  id='datatable' class="table">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title alignment">Medicine Name</th>
                                    <th class="column-title alignment">Quantity</th>
                                    <th class="column-title alignment">Price</th>
                                </thead>

                                <tbody>
                                @foreach($tempPurchaseList as $item)
                                    <tr >
                                        <td class="alignment">{{$item->medicine_name}}</td>
                                        <td class="alignment">{{$item->quantity}}</td>
                                        <td class="alignment">{{$item->price}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br/>
                            <br/>

                            <div  class="form-group">
                                <label class="control-label col-md-5 alignment">Total Price</label>
                                <diV class="col-md-3">
                                    <input type="text" class="form-control col-md-12 alignment" value="{{$totalPrice}}" name="total_price" readonly>

                                </diV>
                                <br/>
                                <br/>

                            </div>

                            <div  class="form-group">
                                <label class="control-label col-md-5 alignment">Paid amount</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control col-md-12"   name="paid_amount" required="">

                                </div>
                                <br/>
                                <br/>
                                <br/>
                            </div>

                            <div class="form-group">
                                <div align="center">

                                    <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
