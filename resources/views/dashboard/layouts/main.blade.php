<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    @include('dashboard.layouts.link')
</head>


<body class="@if (request()->routeIs('login*')) authentication-bg bg-primary @endif">
    @yield('login')

    @if (!request()->routeIs('login*'))
        <!-- Begin page -->
        <div id="layout-wrapper">
            @include('dashboard.layouts.header')

            @include('dashboard.layouts.sidebar')

            <div class="main-content">
                <div class="page-content">
                    @yield('breadcrumb')
                    <div class="container-fluid">
                        <div class="page-content-wrapper">
                            @yield('content')
                        </div>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                @include('dashboard.layouts.footer')
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
    @endif
    @include('dashboard.layouts.script')
</body>

</html>
