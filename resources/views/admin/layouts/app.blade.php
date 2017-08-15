<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>@yield('title') | Naijadevs</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Naijadevs connects talented Nigerian developers and designers with companies who needs them." name="description" />
    <meta content="Chimezie Enyinnaya" name="author" />
    <meta name="robots" content="noindex,nofollow">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('admin/assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('admin/assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('admin/assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/layouts/layout/css/themes/darkblue.min.cs') }}s" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('admin/assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        @include('admin.partials._header')
        
        <div class="clearfix"></div>

        <div class="page-container">
            <div class="page-sidebar-wrapper">
                @include('admin.partials._sidebar')
            </div>

            <div class="page-content-wrapper">
                @yield('content')
            </div>
        </div>
        
        @include('admin.partials._footer')
    </div>

    <!--[if lt IE 9]>
    <script src="{{ asset('admin/assets/global/plugins/respond.min.js') }}"></script>
    <script src="{{ asset('admin/assets/global/plugins/excanvas.min.js') }}"></script> 
    <script src="{{ asset('admin/assets/global/plugins/ie8.fix.min.js') }}"></script> 
    <![endif]-->
    
    <script src="{{ asset('admin/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
    
    <script>
        $(document).ready(function() {
            // 
        });
    </script>
</body>
</html>