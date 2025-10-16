@extends('layouts.app')

@section('content')
<section class="bg-white border-bottom py-5">
    <div class="container py-3">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <h1 class="display-6 fw-extrabold mb-3">{{ __('Welcome back!') }}</h1>
                <p class="lead text-muted mb-4">{{ __('Discover new arrivals, exclusive deals and continue where you left off.') }}</p>
                <div class="d-flex gap-2">
                    <a href="{{ route('product.index') }}" class="btn btn-primary btn-lg">{{ __('Start shopping') }}</a>
                    <a href="{{ url('/') }}" class="btn btn-outline-primary btn-lg">{{ __('Go to home') }}</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-hover">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                        @endif
                        <h2 class="h5 mb-3">{{ __('Your account') }}</h2>
                        <ul class="list-unstyled mb-0 small">
                            <li class="mb-2">✅ {{ __('You are logged in!') }}</li>
                            <li class="mb-2">🛒 {{ __('View products and add to cart') }}</li>
                            <li>⭐ {{ __('Save favorites and manage your profile') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
