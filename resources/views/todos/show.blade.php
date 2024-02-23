@extends("app")
@section('content')
<div class="row">
    <div class="col-12 p-4 mt-2">
        <form action="{{route('todos-update',['id'=>$todo->id])}}" method="POST">
            @method('PATCH')
            @csrf
            @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif
            @error('title')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
            <div class="form-group">
                <label for="title">Tarea</label>
                <input type="text" class="form-control" name="title" aria-describedby="titleHelp"
                    value="{{$todo->title}}">
            </div>
            <div class="form-group">
                <label for="category_id" class="form-label">Categoria de la tarea:</label>
                <select name="category_id" class="custom-select">
                    @foreach ($categories as $category)
                    <option <?php if($category_old->id==$category->id){echo 'selected';}?>
                        value="{{$category->id}}">{{$category->name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mx-auto ">Actualizar tarea</button>
            </div>
        </form>
    </div>
</div>
@endsection