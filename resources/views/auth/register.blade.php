@extends('layouts.app')

@section('content')
<div class="container mt-4 text-light">

    <div class="text-center">
        <h1> <strong>Grow your online business with <span class="text-warning">Deliveboo</span></strong></h1>

        <p class="  fs-4 ">Sign up and become a partner. Sell more, increase your earnings, and manage your online business with us. Your digitization journey starts here.</p>

       
    </div>

    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card bg-dark bg-opacity-50 text-light">
                <div class="card-header bg-light bg-opacity-50 fs-5 ">{{ __('Sign up') }}</div>

                <div class="card-body rounded-pill text-light  ">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right fs-5 ">{{ __('Name') }}</label>

                            <div class="col-md-6 ">
                                <input id="name" type="text" class="form-control bg-transparent text-light @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right fs-5">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control bg-transparent text-light  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right fs-5">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control bg-transparent text-light  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right fs-5 ">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control bg-transparent text-light" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Sign up') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     
</div>


{!! JsValidator::formRequest('App\Http\Requests\Auth\RegisterRequest') !!}
@endsection
