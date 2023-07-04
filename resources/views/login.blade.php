@extends('layouts.app')

@if (auth()->check())
    <?php header('Location: ' . route('vehicle.index')) ?>
@else

    @section('content_login')
        <div class="vh-100 w-100 d-flex align-items-center justify-content-center">
            <form action={{route('login.store')}} method="POST">
                @csrf
                <h2 class="mb-4">Login</h2>
                @error('error')
                    <p class="alert alert-secondary" role="alert">{{ $message }}</p>
                @enderror
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="jcsjeffrey@gmail.com" required>
                @error('email')
                    <p class="alert alert-secondary" role="alert">{{ $message }}</p>
                @enderror
                <label>Senha</label>
                <input type="password" class="form-control" name="password" value="12345678" required>
                @error('password')
                    <p class="alert alert-secondary" role="alert">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn btn-primary mt-4 w-100">Entrar</button>
            </form>
        </div>
    @endsection

@endif

