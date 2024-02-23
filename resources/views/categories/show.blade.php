@extends('app')
@section('content')
<div class="row">
    <div class="col-12 p-4">
        <form action="{{route('categories.update',['category'=>$category->id])}}" method="POST">
            @method('PATCH')
            @csrf
            @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif
            @error('name')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
            <div class="form-group">
                <label for="name">Nombre de la categoria:</label>
                <input type="text" class="form-control" name="name" aria-describedby="nameHelp"
                    value="{{$category->name}}">
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="color" class="form-control" name="color" aria-describedby="nameHelp"
                    placeholder="Color de la categoria">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mx-auto">Crear nueva categoria</button>
            </div>
        </form>
    </div>
</div>
<div class="row">
    @if ($category->todos()->count()>0)
    @foreach ( $category->todos as $todo )
    <div class="col-md-9 px-4 my-2 d-flex align-items-center">
        <a href="{{route('todos-update',['id'=>$todo->id])}}">{{$todo->title}}</a>
    </div>
    <div class="col-md-3 d-flex justify-content-end">
        <form action="{{ route('todos-destroy',[$todo->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger my-2 btn-sm">Eliminar</button>
    </div>
    @endforeach
    @else
    No hay tareas para esta categoría
    @endif
</div>
@endsection