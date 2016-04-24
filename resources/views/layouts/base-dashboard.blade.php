<!doctype html>
<html lang="en">
<head>
@include('includes.dashboard-head')
</head>
<body>


<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        @include('includes.dashboard-header')
    </div>

    <div id="main">
        @yield('content')
    </div>
</div>


<script src="/js/ui.js"></script>


</body>
</html>
