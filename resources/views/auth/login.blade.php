@extends('templates.auth')
@section('auth')
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center"
        style="background-image: url('{{ asset('backend/assets/img/background/bg.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-title">
                            <h1 class="mt-2 m-3">Login Disini</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('auth.authentication') }}" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" autofocus>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button class="btn btn-success btn-sm mx-2">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
