<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Divisi Pemberdayaan Ekonomi Masyarakat Yayasan Maha Bhoga Marga</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-blue.min.css')}}">
</head>

<body>
    <div class="auth-layout-wrap p-3" style="background-image: url({{asset('assets/images/team-bg.jpeg')}})">
        <div class="card col-md-4 o-hidden">
            <div class="row">
                <div class="col-md-12">
                    <div class="px-3 py-5">
                        <h1 class="mb-3 text-18">Sign Up</h1>
                        <form action="">
                            <div class="form-group">
                                <label for="username">Your name</label>
                                <input id="username" class="form-control form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input id="email" class="form-control form-control" type="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control form-control" type="password">
                            </div>
                            <div class="form-group">
                                <label for="repassword">Retype password</label>
                                <input id="repassword" class="form-control form-control" type="password">
                            </div>
                            <button class="btn btn-primary btn-block mt-5">Sign Up</button>
                        </form>
                        <div class="mt-3 text-center">
                            I'm already a member.
                            <a href="{{ route('sign-in')}}" class="text-muted"><u> Sign in</u></a>
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
