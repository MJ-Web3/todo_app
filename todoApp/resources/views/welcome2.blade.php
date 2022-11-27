<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <title>Welcome</title>
</head>
<body>
    <div class="container mt-5">
        <div class="border border-primary border-4 rounded-5 ">
            <h1 class="mt-5 mb-5 ms-5">
                To Visit This Website You have To Get An Account Just Click <a href="{{url('/register')}}" class="btn btn-primary btn-lg">Create New Account</a>
                Or If You Have Aulredy Account Just Click <a href="{{url('/login')}} " class="btn btn-primary btn-lg">Sign In</a></h1>
            </h1>
        </div>
    </div>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>