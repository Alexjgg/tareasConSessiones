@extends("app")
@section('content')
<div class="row">
    <div class="col-12 p-4">
        <form action="{{route('todos')}}" method="POST">
            @csrf
            @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif
            @error('title')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
            <div class="form-group">
                <label for="title">Tarea:</label>
                <input type="text" class="form-control" name="title" aria-describedby="titleHelp"
                    placeholder="Título de la tarea">
            </div>
            <div class="form-group">
                <label for="category_id" class="form-label">Categoria de la tarea:</label>
                <select name="category_id" class="custom-select">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mx-auto">Crear nueva tarea</button>
            </div>
        </form>
    </div>
</div>
@foreach ( $todos as $todo )
<div class="row">
    <div class="col-md-9 px-4 my-1 d-flex align-items-center">
        <a href="{{ route('todos-show', ['id'=>$todo->id]) }}">{{ $todo->title }}</a>
    </div>
    <div class="col-md-3 px-4 my-1 d-flex justify-content-end">
        <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm">Eliminar</button>
        </form>
    </div>
</div>
@endforeach
@endsection