@extends('layouts.app')

@section('content')
<section class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-5 col-md-7">
            <div class="text-center mb-4">
                <h1 class="h3 fw-bold mb-1">Admin</h1>
            </div>
            <div class="text-center mb-4">
                <h1 class="h3 fw-bold mb-1">{{ __('Login') }}</h1>
                <p class="text-muted small mb-0">{{ __('Access your account to continue shopping') }}</p>
            </div>
            <div class="card p-3 p-md-4 card-hover">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="nombre@ejemplo.com">
                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password" class="form-label mb-0">{{ __('Password') }}</label>
                                @if (Route::has('password.request'))
                                    <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                @endif
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Login') }}</button>
                        </div>
                    </form>

                    @guest
                    <div class="text-center mt-3 small">
                        <span class="text-muted me-1">{{ __('New here?') }}</span>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="fw-semibold">{{ __('Register') }}</a>
                        @endif
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
