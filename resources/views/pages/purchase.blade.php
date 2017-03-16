@extends('layouts.default')
<?php
$success=Session::get('success');
$error=Session::get('error');
?>
@section('title')
    Purchasing List
@endsection
@section('stylesheet')
    <link href="{{ URL::asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::asset('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/vendors/build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('/css/header.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/w3.css') }}">
    <style>
        .form-inline > * {
            margin:5px 3px;
        }
    </style>
@endsection

@section('content')
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if($success!=null)<div align="center" ><h4>{{$success}}</h4></div>@endif
                    @if($error!=null)<div align="center" ><h4>{{$error}}</h4></div>@endif
                    <div align="center" class="panel-heading"><h3>Make a List</h3></div>

                    <div class="panel-body">
                        <div align="center">
                            <form name="listMake" class="form-inline" action="{{route('create.temp.list')}}" method="POST" onclick="return validate();">
                                {{ csrf_field() }}
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Medicine Name</label>
                                <select class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="selected_medicine">
                                    <option selected value="">Choose...</option>
                                    @foreach($medicineData as $data)
                                    <option value="{{$data->_id}}">{{$data->medicine_name}}</option>
                                    @endforeach
                                </select>
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Medicine quantity</label>
                                <select class="form-control mb-3 mr-sm-3 mb-sm-0" id="inlineFormCustomSelect" name="quantity">
                                    <option selected value="">Choose...</option>
                                    @for($i=1;$i<=200;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                            </form>
                        </div>
                        @if(sizeof($tempPurchaseList)>0)
                            <div align="center" class="row">
                                <h2>Selected Medicine List</h2>
                                <br/>
                                <div align="right">
                                    <form class="form-horizontal" id="deleteData" action="{{route('delete.list.all')}}" method="POST" >
                                        {{ csrf_field() }}
                                        <td class=" alignment"><button type="submit" class="btn btn-danger" name="submit" onclick="return confirmFunction();" value="delete_submit">Clear All</button></td>
                                    </form>
                                </div>

                                <table  id='datatable' class="table table-striped jambo_table table-bordered">
                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title alignment">Medicine Name</th>
                                        <th class="column-title alignment">Quantity</th>
                                        <th class="column-title alignment">Price</th>
                                            <th class="column-title alignment">#</th>
                                    </thead>

                                    <tbody>
                                    @foreach($tempPurchaseList as $item)
                                        <tr >
                                            <td class="alignment">{{$item->medicine_name}}</td>
                                            <td class="alignment">{{$item->quantity}}</td>
                                            <td class="alignment">{{$item->price}}</td>

                                                <form class="form-horizontal" id="deleteData" action="{{route('delete.list')}}" method="POST" >
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{$item->_id}}" name="_id_">
                                                    <td class=" alignment"><button type="submit" class="btn btn-danger" name="submit" onclick="return confirmFunction();" value="delete_submit"> Delete</button></td>
                                                </form>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div align="right">

                                <br/>
                                <button class="btn btn-primary"><a href="{{route('create.memo')}}">Next</a></button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
    function validate(){
    var x = document.forms["listMake"]["selected_medicine"].value;
    var y = document.forms["listMake"]["quantity"].value;
         if(x==null || y==null){
            alert('Please,select option first before submiting.');
            return  false;
        }
         return true;
    }

    function confirmFunction() {

        var v = confirm("Do you want to delete ?\n If you delete data you can not get it.\nOtherwise you can edit data.");
        if (v == true) {
            document.getElementById("deleteData").submit();
        } else {
            return false;

        }
    }
    </script>
@endsection
