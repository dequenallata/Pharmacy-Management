@extends('layouts.default')
<?php
$error=Session::get('error');
$data=$medicineEditData;
?>

@section('title')
   Edit Medicine Info
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
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                @if($error!=null)<div align="center" ><h4>{{$error}}</h4></div>@endif
                <div align="center" class="panel-heading"><h3>Edit Medicine Info</h3></div>
                    <div align="center">
                        <br/>
                        <form class="form" method="POST" action="{{route('update')}}">
                            <input type="hidden" name="_id_" value="{{$data->_id}}">
                             {{ csrf_field() }}
                            <div  class="form-group">
                                   <label class="control-label col-md-5 alignment">Medicine Name</label>
                                <diV class="col-md-5">
                                    <input type="text" class="form-control col-md-12" value="{{$data->medicine_name}}" name="medicine_name" required="">

                                </diV>
                                <br/>
                                <br/>
                            </div>

                             <div  class="form-group">
                                   <label class="control-label col-md-5 alignment">Generic Name</label>
                                <diV class="col-md-5">
                                    <input type="text" class="form-control col-md-12" value="{{$data->generic_name}}" name="generic_name" required="">

                                </diV>
                                <br/>
                                <br/>

                            </div>
                       
                            <div  class="form-group">
                                   <label class="control-label col-md-5 alignment">Medicine Company</label>
                                <diV class="col-md-5">
                                    <input type="text" class="form-control col-md-12" value="{{$data->medicine_company}}" name="medicine_company" required="">

                                </diV>
                                <br/>
                                <br/>
                            </div>
                           
                            <div  class="form-group">
                                   <label class="control-label col-md-5 alignment">Price rate</label>
                                <diV class="col-md-5">
                                    <input type="text" class="form-control col-md-12"value="{{$data->price_rate}}" name="price_rate" required="">

                                </diV>
                                <br/>
                                <br/>

                            </div>
                            
                            <div  class="form-group">
                                   <label class="control-label col-md-5 alignment">Placed on</label>
                                <diV class="col-md-5">
                                    <input type="text" class="form-control col-md-12" value="{{$data->placed_on}}"  name="placed_on" required="">

                                </diV>
                                <br/>
                                <br/>
                            </div>
                            <div  class="form-group">
                                   <label class="control-label col-md-5 alignment">status</label>
                                <diV class="col-md-5">
                                    <select class="form-control col-md-12" name="status">
                                        <option value="Available">Available</option>
                                        <option value="Not-Available">Not-Available</option>
                                    </select>

                                </diV>
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
</div>
@endsection
