@extends('layouts.app')

@section('content')
<div class="container mt-4 text-light">

    <div class="text-center">
        <h1> <strong>Fai crescere la tua attività online con <span class="text-info">Deliveboo</span></strong></h1>

        <p class="  fs-4 ">Registrati e diventa un partner. Vendi di più, aumenta le tue entrate e gestisci la tua attività online insieme a noi. Il tuo percorso di digitalizzazione inizia qui.</p>

       
    </div>

    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card bg-transparent text-light">
                <div class="card-header bg-light bg-opacity-50 fs-5 ">{{ __('Register') }}</div>

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
                                <button type="submit" class="btn btn-info">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     
</div>
@endsection
