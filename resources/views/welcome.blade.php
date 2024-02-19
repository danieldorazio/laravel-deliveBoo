@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4  rounded-3  ">
        <div class="container py-5 my-text  d-flex flex-column justify-content-end text-center my-dimension">
            <div class="text-uppercase">
                <h1> <strong>Diventa un partner di <span class="text-info">Deliveboo</span></strong> </h1>
            </div>

            <div class="fs-3">
                <p>Insieme possiamo aiutarti a raggiungere sempre più clienti</p>
            </div>

            <div>
                @guest

                    @if (Route::has('register'))
                        <a class=" btn btn-info text-light" href="{{ route('register') }}">{{ __('Diventa nostro partner') }}</a>
                    @endif
                    @else
                        <h3 class="text-info">Login successfully </h3>
                    @endguest
                
            </div>
        </div>
    </div>
@endsection
