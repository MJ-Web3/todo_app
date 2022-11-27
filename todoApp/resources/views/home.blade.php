
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

    <x-app-layout>
        <x-slot name="header">
                {{-- @include('navigation-menu') --}}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                To Do Page
            </h2>
        </x-slot>
        
    {{-- alert start --}}
    @if(session()->has('delete'))
        <div class="container">
            <div class="alert alert-warning alert-dismissible fade show  mt-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <h3 class="text-center">{{session('delete')}}</h3>
            </div>
        </div>
    @endif
    {{-- alert end --}}

    {{-- form start --}}
    <div class="container mt-5 ">
        <h1 class="mb-5">Create To Do List</h1>
        <form action="{{url('todo/')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-8 mt-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="title" id="todoinput" placeholder="Create New To Do">
                        <label for="todoinput">Create New To Do</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="formFileLg" class="form-label">Chose Image File</label>
                        <input class="form-control form-control-lg" name="img" id="formFileLg" type="file">
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" value="Create" class="btn btn-primary">
            </div>
        </form>
    
    </div>
    {{-- form end --}}


    {{-- showing data start --}}
    <div class="container mt-5">
            <a class="btn btn-primary" href="{{asset('csv/file.csv')}}">Download CSV File</a>


        @foreach($lists as $list)
        <div class="container mt-5">
            <div class="card text-bg-secondary  mb-3" style="max-width: 100%;">
                @if($list->done == 1)
                <div class="card-header text-bg-danger text-center">
                    <h3>This Task Has Be Done In ➡️ {{$list->updated_at}} 👌 ✓</h3>
                </div>
                @endif
                <div class="card-body mt-2">
                    <div class="row">
                        <div class="col-md-4"><img class="rounded-circle" src="img/{{$list->img}}" alt="img" width="100px" height="100px"></div>
                        <div class="col-md-4"><h3>{{$list->title}}</h3></div>
                        <div class="col-md-4">
                            {{-- buttons start --}}
                        <div class="d-flex justify-content-end mb-2 me-2">
                            {{-- edit button start --}}
                            <a href="{{url('todo/' . $list->id)}}">
                                <button type="button" class="btn btn-success me-3">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>
                            {{-- edit button end --}}
                            
                            {{-- delete button start --}}
                            <form action="{{url('todo/' . $list->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                            {{-- delete button end --}}
                        </div>
                        
                        {{-- buttons end --}}
                        </div>
                    </div>
                </div>

        </div>
        </div>
        @endforeach
    </div>
    {{-- showing data end --}}

    </x-app-layout>
    
    


    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>

