<html lang="en">

<head>
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

    @include('layouts_admin.top')
    <br>
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header" style="text-align: center">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>username salah</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>password salah</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
    {{-- <script>
        var limit = 1;
    $('input#single-checkbox').on('change', function(evt) {
    if($(this).siblings(':checked').length >= limit) {
    this.checked = false;
    }
    });
    </script>
    <script>
        $(".single-checkbox").change(function() {
    if(this.checked) {
        console.log($('input[name="calon_id"]:checked'))
    }
    });
    </script> --}}
    {{-- <div class="" style="position: absolute;bottom:0; display: flex;right: 0">
        <hr>
        <span>Copyright&copyMSatriyoNN2021</span>
    </div> --}}
</body>

</html>
