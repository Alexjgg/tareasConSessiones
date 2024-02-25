@extends("app")
@section('content')
<div class="row">
    <div class="col-12 p-2">
        <h1 class="text-center">LOGIN</h1>
        <form method="POST" action="{{url('login')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="Email" aria-describedby="emailHelp"
                    value="{{ old('email') }}" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="Password" placeholder="Password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mx-auto">Login</button>
            </div>

        </form>
    </div>
</div>
@endsection