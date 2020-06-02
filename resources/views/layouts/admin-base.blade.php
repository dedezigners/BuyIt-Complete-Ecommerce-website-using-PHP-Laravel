<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/admin/img/favicon.ico">
    <link rel="icon" type="image/png" href="/assets/admin/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    
    <!-- CSS Files -->
    <link href="/assets/admin/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
</head>

<body class="off-canvas-sidebar">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
        <div class="container">
            <div class="navbar-wrapper"><a class="navbar-brand" href="/">Ecommerce</a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a href="/login" class="nav-link">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="/register" class="nav-link">
                            <i class="material-icons">person_add</i> Register
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('/assets/admin/img/login.jpg'); background-size: cover; background-position: top center;">

        @yield('page-content')
        
    </div>
</body>
</html>