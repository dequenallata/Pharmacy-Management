<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 3/12/2017
 * Time: 5:21 PM
 */

?>
<div  class="row">
    <div class="navbar">
        <div  class="navbar-inner col-sm-12">
            <ul  class="nav col-md-4 ">

            </ul>
            <ul  class="nav col-md-8">


                @if (Auth::guest()==false)

                    <li style="float: right">
                        <a href="{{ url('/logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li >
                        <li style="width: auto ;float: right;"><a href="{{route('profile',array('id'=>Auth::user()->_id))}}">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
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