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
    <link rel="stylesheet" href="/client/icon/css/all.min.css">
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
                    <li><a class="nav-link" href="{{ route('shop') }}">Cửa hàng</a></li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="">Danh
                            mục</a>
                        <ul class="__dropwn_parent_custom dropdown-menu">
                            @foreach ($category as $item)
                            <li><a class="dropdown-item __dropwn_chilren_custom" href="/danhmuc/{{ $item->id }}">
                                        {{ $item->name_category }}
                                    </a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a class="nav-link" href="{{ route('about') }}">Giới thiệu</a></li>
                    <li><a class="nav-link" href="{{ route('services') }}">Dịch vụ</a></li>
                    <li><a class="nav-link" href="{{ route('blogs') }}">Tin tức</a></li>
                    <li><a class="nav-link" href="{{ route('contact') }}">Liên hệ</a></li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="">Ngôn
                            ngữ</a>
                        <ul class="__dropwn_parent_custom dropdown-menu">
                            <li><a class="dropdown-item __dropwn_chilren_custom" href="/">Tiếng Anh</a></li>
                            <li><a class="dropdown-item __dropwn_chilren_custom" href="/">Tiếng Việt</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="">Tài
                            khoản</a>
                        @if ($user)
                            <ul class="__dropwn_parent_custom dropdown-menu">
                                <li><a class="dropdown-item __dropwn_chilren_custom"
                                        href="">{{ $user->name }}</a></li>
                                <li><a class="dropdown-item __dropwn_chilren_custom" href="{{ route('profile') }}">Tài
                                        khoản</a></li>
                                <li><a class="dropdown-item __dropwn_chilren_custom" href="{{ route('cart') }}">Giỏ
                                        hàng</a></li>
                                <li><a class="dropdown-item __dropwn_chilren_custom" href="{{ route('logout') }}">Đăng
                                        xuất</a></li>
                            </ul>
                        @else
                            <ul class="__dropwn_parent_custom dropdown-menu">
                                <li><a class="dropdown-item __dropwn_chilren_custom" href="/login">Đăng nhập</a></li>
                                <li><a class="dropdown-item __dropwn_chilren_custom" href="/register">Đăng ký</a></li>
                            </ul>
                        @endif
                    </li>
                </ul>


            </div>
        </div>

    </nav>
