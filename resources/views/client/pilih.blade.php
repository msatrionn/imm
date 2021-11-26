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
        /* The container */
        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked~.checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>
    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <a href="#" class="az-logo"><span style="color: red; text-transform: capitalize">IMM</span>
                </a>
            </div><!-- az-header-left -->
            <div class="az-header-menu">
                <div class="az-header-menu-header">
                    <a href="#" class="az-logo"><span>IMM</span> </a>
                    <a href="" class="close">&times;</a>
                </div><!-- az-header-menu-header -->

            </div><!-- az-header-menu -->
            <div class="az-header-right">

                <div class="dropdown az-profile-menu">
                    <a href="" class="az-img-user"><img src="{{ asset('img/user.png') }}" alt="gambar"></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                                <img src="{{ asset('img/user.png') }}" alt="gambar">
                            </div><!-- az-img-user -->
                            @if (auth()->user() != null )
                            <h6>{{auth()->user()->username }}</h6>
                            @endif
                            @if (auth()->user() !=null and auth()->user()->level=='admin')
                            <span>Admin Website</span>
                            @elseif(auth()->user() !=null)
                            <span>Anggota</span>
                            @endif
                        </div><!-- az-header-profile -->

                        {{-- <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                        <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
                        <a href="" class="dropdown-item"><i class="typcn typcn-time"></i> Activity Logs</a>
                        <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a>
                        --}}
                        @if (auth()->user() !=null )

                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="typcn typcn-power-outline"></i> Sign
                                Out</button>
                        </form>
                        @endif
                    </div><!-- dropdown-menu -->
                </div>
            </div><!-- az-header-right -->
        </div><!-- container -->
    </div><!-- az-header -->

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <h1>Silahkan Pilih 9 dari 20 Calon</h1>
                <div class="row">
                    @foreach ($calon as $item)
                    <div style=" width:178px; margin-top: 50px;margin-left: 20px">
                        <h5 class="card-title" style="text-align: center;padding-top: 8px">
                            Nomor {{ $item->nomor_calon
                            }}
                        </h5>
                        <div class="card shadow" style="height: 200px">

                            <img class="card-img-top" src="{{ asset('img/' . $item->foto) }}" alt="Card image cap"
                                height="224px" style="object-fit: cover">
                        </div>
                        <div class="">

                            <form action="{{ route('pilih_calon') }}" method="post">
                                @csrf
                                <label class="container">
                                    <input class="single" type="checkbox" name="calon_id[]"
                                        value="{{ $item->id_calon }}" id="single">
                                    <span class="checkmark"></span>
                                </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br><br><br>

                <div class="col-md-3">
                    <div class="hasil">0/9</div>
                    <button type="submit" class="btn btn-primary " id="pilih"
                        onclick="return confirm('Anda sudah yakin?')" style="display: none">Pilih</button>
                </div>
                </form>
            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->


    <script src="{{ asset('azia/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('azia/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('azia/lib/ionicons/ionicons.js') }}"></script>
    <script src="{{ asset('azia/lib/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer">
    </script>

    <script src="{{ asset('azia/js/azia.js') }}"></script>
    <script>
        var max_limit = 2; // Max Limit
        var count = 0;
        var numberOfChecked = $(".single:input:checkbox:checked").length;
        $(document).ready(function (){




        $(".single:input:checkbox").each(function (index){

        this.checked = (".single:input:checkbox" < max_limit); }).change(function (){
            if($(".single:input:checkbox:checked").length> max_limit){
                this.checked = false;

                }
            if($(".single:input:checkbox:checked").length == max_limit){
                $('#pilih').css('display','block')
                }
            if($(".single:input:checkbox:checked").length < max_limit){
            $('#pilih').css('display','none')
            }
            if ($(".single:input:checkbox:checked")) {
            $('.hasil').html($(".single:input:checkbox:checked").length + '/9')
            }

            });
            });
    </script>
    {{-- <div class="" style="position: absolute;bottom:0; display: flex;right: 0">
        <hr>
        <span>Copyright&copyMSatriyoNN2021</span>
    </div> --}}
</body>

</html>
