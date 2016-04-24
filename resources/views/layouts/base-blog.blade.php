<!doctype html>
<html>
<head>
    @include('includes.blog-head')
</head>
<body>
<!--<div class="container"> -->
 <div id="layout" class="pure-g-r">
    <div class="sidebar pure-u-md-1-4">
        @include('includes.blog-header')
    </div>

    <div class="content pure-u-md-3-4">
        <div>
            @yield('content')
        
            

            <div class="footer">
            	<h1 class="content-subhead"></h1>
                @include('includes.blog-footer')
            </div>
        </div>
    </div>
</div>
        
    
    


</body>
</html>