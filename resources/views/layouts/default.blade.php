<?php

?>
<!DOCTYPE html>
<html>
<head>
   <title>@yield('title')</title>
    @include('includes.head')
    @yield('stylesheet')
</head>
<body>
    <div class="container">

        <header class="row">
            @include('includes.header')
        </header>

        <div id="main" class="row">
            @yield('content')

        </div>

    </div>
   @yield('script')
</body>
</html>
