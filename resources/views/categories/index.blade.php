@extends('app')
@section('content')
<div class="row">
    <div class="col-12 p-4">
        <form action="{{route('categories.store')}}" method="POST">
            @csrf
            @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif
            @error('name')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" aria-describedby="nameHelp"
                    placeholder="Nombre de la categoria">
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
@foreach ($categories as $category)
<div class="row">
    <div class="col-md-9 px-4 my-2 d-flex align-items-center">
        <a class="d-flex align-items-center gap-2" href="{{ route('categories.show', ['category' => $category->id]) }}">
            <span class="color-container" style="background-color: {{ $category->color }};
                                    color: #fff;
                                    padding: 13px;
                                    border-radius: 10px;
                                    margin-right:4px;"></span> {{
            $category->name }}
        </a>
    </div>

    <div class="col-md-3 px-2 my-2 d-flex justify-content-end">
        <button class="btn btn-danger btn-sm" data-toggle="modal"
            data-target="#modal{{$category->id}}">Eliminar</button>

    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="modal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Al eliminar la categoría <strong>{{ $category->name }}</strong> se eliminan todas las tareas
                asignadas a la misma.
                ¿Está seguro que desea eliminar la categoría <strong>{{ $category->name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No,
                    cancelar</button>
                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">Sí, eliminar categoía</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endforeach

@endsection