<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script>
        window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-90680653-2');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>IMM</title>

    <!-- vendor css -->
    <link href="{{ asset('azia/lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('azia/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('azia/lib/typicons.font/typicons.css') }}" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="{{ asset('azia/css/azia.css') }}">

</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    @include('layouts_admin.top')

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        {{-- <div class="" style="position: absolute;margin-top: 50vh;margin-left: 50px">
            <hr>
            <span>Copyright&copyMSatriyoNN2021</span>
        </div> --}}
        <div class="container">
            @include('layouts_admin.left')
            <div class="az-content-body pd-lg-l-40 d-flex flex-column">

                <h2 class="az-content-title">@yield('judul')</h2>
                @yield('home')

            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->


    <script src="{{ asset('azia/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('azia/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('azia/lib/ionicons/ionicons.js') }}"></script>
    <script src="{{ asset('azia/lib/chart.js/Chart.bundle.min.js') }}"></script>


    <script src="{{ asset('azia/js/azia.js') }}"></script>
</body>

</html>
