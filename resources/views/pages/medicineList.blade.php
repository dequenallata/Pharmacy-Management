@extends('layouts.default')
<?php
$success=Session::get('success');
$error=Session::get('error');
?>
@section('title')
    Medicines List
@endsection

@section('stylesheet')
    <!-- Bootstrap -->
    <link href="{{ URL::asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::asset('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/vendors/build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('/css/header.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/w3.css') }}">
    <style>

    </style>
@endsection

@section('content')
    <br/>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @if($success!=null)<div align="center" ><h4>{{$success}}</h4></div>@endif
                @if($error!=null)<div align="center" ><h4>{{$error}}</h4></div>@endif
                <div align="center" class="panel-heading"><h3>List of Medicines</h3></div>

                <div class="panel-body">
                    <table  id='datatable' class="table table-striped jambo_table table-bordered">
                        <thead>
                        <tr class="headings">
                            <th class="column-title alignment">Medicine Name</th>
                            <th class="column-title alignment">Generic Name</th>
                            <th class="column-title alignment">Company</th>
                            <th class="column-title alignment">Price Rate</th>
                            <th class="column-title alignment">Placed On</th>
                            <th class="column-title alignment">Status</th>
                            @if(Auth::guest()==false)
                            <th class="column-title alignment">#</th>
                            <th class="column-title alignment">#</th>
                            @endif

                        </thead>

                        <tbody>
                            @foreach($medicineData as $item)
                                <tr >
                                    <td class="alignment">{{$item->medicine_name}}</td>
                                    <td class="alignment">{{$item->generic_name}}</td>
                                    <td class="alignment">{{$item->medicine_company}}</td>
                                    <td class="alignment">{{$item->price_rate}}</td>
                                    <td class="alignment">{{$item->placed_on}}</td>
                                    <td class="alignment">{{$item->status}}</td>
                                     @if(Auth::guest()==false)

                                    <form class="form-horizontal" action="{{route('edit.medicine',array('$id'=>$item->_id))}}" method="GET">
                                        {{ csrf_field() }}
                                        <td class=" alignment"><button type="submit" class="btn btn-info"> Edit</button></td>
                                    </form>

                                   <form class="form-horizontal" id="deleteData" action="{{route('delete.medicine')}}" method="POST" >
                                       {{ csrf_field() }}
                                        <input type="hidden" value="{{$item->_id}}" name="_id_">
                                        <td class=" alignment"><button type="submit" class="btn btn-danger" name="submit" onclick="return confirmFunction();" value="delete_submit"> Delete</button></td>
                                    </form>

                                     @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')


    <!--Datatable -->
    <script src="{{URL::asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('/js/bootstrap.js')}}"></script>
    <script src="{{URL::asset('/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{URL::asset('/js/jquery.datatable.min.js')}}"></script>
    <script src="{{URL::asset('/js/datatable.bootstrap.js')}}"></script>


    <script>

        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
        var $datatable = $('#datatable');

        $datatable.dataTable({
            'order': [[ 0, 'asc' ]],
            'columnDefs': [
                { orderable: false, targets: [1,2,3,4,5,6,7] }
            ]
        });


        function confirmFunction(){

            var v=confirm("Do you want to delete ?\n If you delete data you can not get it.\nOtherwise you can edit data.");
            if ( v== true) {
                document.getElementById("deleteData").submit();
            } else {
                return false;
            }

        }
    </script>
@endsection
