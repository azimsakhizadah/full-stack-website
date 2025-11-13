<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Laravel 12</title>
    <style>
        .navbar-nav .nav-link {
        font-weight: 500;
        color: #333;
        transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
        color: #0d6efd;
        }

        .navbar-brand img {
        vertical-align: middle;
        }

        .navbar {
        transition: background-color 0.3s, box-shadow 0.3s;
        }

        .navbar.sticky-top {
        background: #fff;
        }

        /* for footer */
        .footer-link {
        color: #333;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 6px;
        transition: color 0.3s;
        }

        .footer-link:hover {
        color: #0d6efd;
        }

        .social-link {
        display: inline-block;
        font-size: 1.3rem;
        color: #0d6efd;
        margin-right: 10px;
        transition: color 0.3s, transform 0.3s;
        }

        .social-link:hover {
        color: #0b5ed7;
        transform: scale(1.1);
        }


    </style>
</head>
<body>
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>