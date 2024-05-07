<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="/client/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="/client/css/tiny-slider.css" rel="stylesheet">
    <link href="/client/css/style.css" rel="stylesheet">
    <link href="/client/css/custom.css" rel="stylesheet">
    <title>
		{{ isset($config) ? $config['title'] : 'Trang chủ' }}
    </title>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="/">Furni<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
                    <li><a class="nav-link" href="{{ route('about') }}">About us</a></li>
                    <li><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                    <li><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                    <li><a class="nav-link" href="{{ route('contact') }}">Contact us</a></li>
                    <li class="dropdown">
						<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="">Account</a>
						<ul class="__dropwn_parent_custom dropdown-menu">
							<li><a class="dropdown-item __dropwn_chilren_custom" href="/login">Login</a></li>
							<li><a class="dropdown-item __dropwn_chilren_custom" href="/register">Register</a></li>
						</ul>
					</li>
                </ul>

               
            </div>
        </div>

    </nav>
