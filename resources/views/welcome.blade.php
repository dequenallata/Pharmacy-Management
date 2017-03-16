

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pharmacy Management</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::asset('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset('/css/header.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/w3.css') }}">

    <style>

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }



        .m-b-md {
            margin-bottom: 30px;
        }
        body,html {
            height: 100%;
            line-height: 1.8;
            background-position: center;
            background-size: cover;
            background-image:URL("{{ URL::to('images/image1.jpg') }}");
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    </style>

</head>
<body >
<div  class="row">
    <div class="navbar">
        <div  class="navbar-inner col-sm-12">
            <ul  class="nav col-md-4 ">

            </ul>
            <ul  class="nav col-md-8">


                @if (Auth::guest()==false)

                    <li style="float: right;">
                        <a href="{{ url('/logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li style="float: right; width: auto"><a href="{{route('profile',array('id'=>Auth::user()->_id))}}">
                            {{ Auth::user()->name }}
                        </a></li>
                    <li style="float: right;"><a href="{{url('/show_history')}}">Recent Memos</a></li>
                        <li style="float: right;"><a href="{{url('/purchase_list')}}">Create Memo</a></li>
                    <li style="float: right;"><a href="{{url('/addProduct')}}">Add Medicine</a></li>
                    <li style="float: right;"><a href="{{url('/list_of_products')}}">Medicines</a></li>
                @endif

            <!-- Authentication Links -->
                @if (Auth::guest()==true)
                    <li style="float: right;"><a href="{{ url('/register') }}">Register</a></li>
                    <li style="float: right;"><a href="{{ url('/login') }}">Login</a></li>

                @endif

                <li style="float: right;"><a href="/">Home</a></li>


            </ul>

        </div>
    </div>
</div>
<div align="center" class="row col-sm-12" >
    <div class="title m-b-md w3-text-dark-grey">
        <br/>

        Pharmacy Management
    </div>
</div>


</body>

</html>
