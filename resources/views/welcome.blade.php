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
                <a class=" btn btn-info text-light" href="{{ route('register') }}">{{ __('Crea un account') }}</a>
            </div>         
        </div>
    </div>   
    @endsection
