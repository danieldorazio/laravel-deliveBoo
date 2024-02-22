@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4  rounded-3  ">
        <div class="container py-5 my-text  d-flex flex-column justify-content-end text-center my-dimension">
            <div class="text-uppercase">
                <h1> <strong>Become a <span class="text-info">Deliveboo</span></strong> partner</h1>
            </div>

            <div class="fs-3">
                <p>Together, we can help you reach more customers.</p>
            </div>

            <div>
                @guest

                    @if (Route::has('register'))
                        <a class=" btn btn-info text-light" href="{{ route('register') }}">{{ __('Become our partner') }}</a>
                    @endif
                    @else
                        <h3 class="text-info">Login completed successfully </h3>
                    @endguest
                
            </div>
        </div>
    </div>
@endsection
