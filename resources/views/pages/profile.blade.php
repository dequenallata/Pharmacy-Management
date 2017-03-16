@extends('layouts.default')
@section('title')
    Profile|Update
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
                    <div align="center" class="panel-heading"><h3>Profile/Update</h3></div>

                    <div class="panel-body">
                        <div align="center">
                            <br/>
                            <form id="updateForm" class="form" method="POST" action="{{route('update.profile')}}" onsubmit="return validation();">
                                {{ csrf_field() }}
                                <div  class="form-group">
                                    <label class="control-label col-md-5 alignment">Name</label>
                                    <diV class="col-md-5">
                                        <input type="text" class="form-control col-md-12" name="name"  value="{{Auth::user()->name}}" required="">
                                    </diV>
                                    <br/>
                                    <br/>
                                </div>

                                <div  class="form-group">
                                    <label class="control-label col-md-5 alignment">Registered Email</label>
                                    <diV class="col-md-5">
                                        <input type="text" class="form-control col-md-12"  value="{{Auth::user()->email}}" readonly>

                                    </diV>
                                    <br/>
                                    <br/>

                                </div>

                                <div  class="form-group">
                                    <label class="control-label col-md-5 alignment">New Password</label>
                                    <diV class="col-md-5">
                                        <input type="password" class="form-control col-md-12" name="new_pass">

                                    </diV>
                                    <br/>
                                    <br/>
                                </div>

                                <div  class="form-group">
                                    <label class="control-label col-md-5 alignment">Confirm Password</label>
                                    <diV class="col-md-5">
                                        <input type="password" class="form-control col-md-12" name="confirm_pass">

                                    </diV>
                                    <br/>
                                    <br/>

                                </div>

                                <div  class="form-group">
                                    <label class="control-label col-md-5 alignment">Current Password</label>
                                    <diV class="col-md-5">
                                        <input type="password" class="form-control col-md-12" name="current_pass" required="">

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

@section('script')
    <script>
        function validation(){
            var x = document.forms["updateForm"]["new_pass"].value;
            var y = document.forms["updateForm"]["confirm_pass"].value;
            if(x==null && y==null){
                return true;
            }

            if((x!=null||y!=null) &&  y!=x){
                alert('New password and Confirm password must be same if you want to change password.')
                return false;
            }

            return true;
        }
    </script>

@endsection