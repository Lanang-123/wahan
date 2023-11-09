<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Divisi Pemberdayaan Ekonomi Masyarakat Yayasan Maha Bhoga Marga</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-blue.min.css') }}">
</head>

<body>
    <div class="auth-layout-wrap p-3" style="background-image: url({{asset('assets/images/team-bg.jpeg')}})">
        <div class="card col-md-4 o-hidden">
               <div class="row">
                <div class="col-md-12">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-4">
                            <img src="{{asset('assets/images/logo.png')}}" alt="">
                        </div>
                        <h1 class="mb-3 text-18">Forgot Password</h1>
                        <form action="">
                            <div class="form-group mb-3">
                                <label for="firstName1">Email address</label>
                                <input type="text" class="form-control" id="firstName1" placeholder="Enter your first name">
                            </div>

                            <button class="btn btn-primary btn-block mt-4">Reset Password</button>

                        </form>
                        <div class="mt-3 text-center">
                            <a class="text-muted" href="{{ route('sign-in')}}"><u>Sign in</u></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/common-bundle-script.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>
