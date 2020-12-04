<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Đăng Ký</title>
    <link rel="stylesheet" href="{{ asset ('Doanweb/login/main.css')}}?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap-grid.min.css" integrity="sha512-QTQigm89ZvHzwoJ/NgJPghQPegLIwnXuOXWEdAjjOvpE9uaBGeI05+auj0RjYVr86gtMaBJRKi8hWZVsrVe/Ug==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
</head>
<body>
    @yield('body')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset ('Doanweb/login/index.js')}}?v=<?php echo time(); ?>"></script>
    @if(session()->has('title'))
        <script>
            swal({
                title:"{{session()->get('title')}}",
                text:"{{session()->get('status')}}",
                icon:"{{session()->get('noti')}}"
            });
        </script>
        {{session()->forget('title')}}
    @endif
</body>
</html>