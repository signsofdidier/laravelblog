<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.head')
<body class="sb-nav-fixed">
@include('layouts.partials.navbar')
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                @include('layouts.partials.sidebar')
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">@yield('title', 'Dashboard')</h1>
                <ol class="breadcrumb mb-4">
                    @yield('breadcrumb', '<li class="breadcrumb-item active">Dashboard</li>')
                </ol>
                {{--               @yield('cards', View::make('layouts.partials.cards'))--}}
                {{--               @yield('charts', View::make('layouts.partials.charts'))--}}
                @yield('content')
            </div>
        </main>
        @include('layouts.partials.footer')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

</body>
</html>
