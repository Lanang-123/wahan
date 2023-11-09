<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link id="gull-theme" rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-blue.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="auth-layout-wrap p-3" style="background-image: url({{asset('assets/images/bg.jpeg')}})">
        <div class="card col-md-4 o-hidden">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-4">
                            <img src="{{asset('assets/images/logo-large.png')}}" alt="">
                        </div>
                        <h1 class="mb-3 text-18">Sign In</h1>
                        <div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
    
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                        </div>
                        <form action="{{ route('submit-sign-in') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="firstName1">Email address</label>
                                <input type="text" name="email" value="" class="form-control" id="firstName1" placeholder="Enter your first name">
                            </div>

                            <div class="form-group mb-3">
                                <label for="firstName1">Password</label>
                                <input type="password" name="password" value="" class="form-control" id="firstName1" placeholder="Enter your first name">
                            </div>

                            {{-- <div class="mt-2">
                                Forgot Password?
                                <a href="{{ route('forgot-password')}}" class="text-muted"><u>Reset</u></a>
                            </div> --}}

                            <button type="submit"  class="btn btn-primary btn-block mt-4">Sign In</button>

                        </form>

                        {{-- <div class="mt-3 text-center">
                            Don't have an account? 
                            <a href="{{ route('sign-up')}}" class="text-muted"><u>Sign up</u></a>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/common-bundle-script.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>
