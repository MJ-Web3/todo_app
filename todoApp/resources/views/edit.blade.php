<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">    <title>Updating</title>
</head>
<body>
    
    

    <div class="container mt-5">
    <h1 class="mb-5">Updating To Do List</h1>
    <form action="{{url('/' . $editList->id)}}" method="POST">
        @csrf
        @method('put')

        <div class="form-floating mb-3">
            <input type="text" class="form-control" value="{{$editList->title}}" name="title" id="title" placeholder="Update Your To Do">
            <label for="title">Update Your To Do</label>
        </div>

        <div class="form-check form-switch mb-5 mt-3">
            <input class="form-check-input" name="checkbox" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label ms-2" for="flexSwitchCheckDefault">Done Task</label>
        </div>
        <button type="submet" class="btn btn-primary">Update</button>
    </form>
    </div>

    

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script></body>
</html>