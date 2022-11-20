<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <title>Home</title>
</head>
<body>
    
    {{-- form start --}}
    <div class="container mt-5">
        <h1 class="mb-5">Create To Do List</h1>
        <form action="{{url('/')}}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="title" id="todoinput" placeholder="Create New To Do">
                <label for="todoinput">Create New To Do</label>
            </div>
            <div>
                <input type="submit" value="Create" class="btn btn-primary">
            </div>
        </form>
    
    </div>
    {{-- form end --}}

    {{-- showing data start --}}
    <div class="container mt-5">
        @foreach($lists as $list)
        <div class="container mt-5">
            <div class="card text-bg-secondary  mb-3" style="max-width: 100%;">
                @if($list->done == 1)
                <div class="card-header text-bg-danger text-center">
                    <h3>This Task Has Be Done In ➡️ {{$list->updated_at}} 👌 ✓</h3>
                </div>
                @endif
                <div class="card-body"><h3>{{$list->title}}</h3></div>
            {{-- buttons start --}}
            <div class="d-flex justify-content-end mb-2 me-2">

                <a href="{{url('/' . $list->id)}}">
                    <button type="button" class="btn btn-success me-3">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </a>
                

                <form action="{{url('/' . $list->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>

            </div>
            {{-- buttons end --}}
        </div>
        </div>
        @endforeach
    </div>


    {{-- showing data end --}}

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>