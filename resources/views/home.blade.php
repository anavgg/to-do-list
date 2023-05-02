<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
    <title>To Do List</title>
</head>


<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">To-Do List</h1>
            <form method="POST" action="{{ route('store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Add a new task" value="{{ old('content') }}">
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-3">Add Task</button>
            </form>

            @if (count($todolists))
            <table class="table">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todolists as $todolist)
                        <tr>
                            <td>{{ $todolist->content }}</td>
                            <td>
                                <form method="POST" action="{{ route('destroy', $todolist->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
        <h5 class="text-center mt-3">No tasks!</p>
            @endif
            
        </div>
    </div>
</div>

</body>
</html> 