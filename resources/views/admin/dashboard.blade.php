@php
    $user = Auth::user();
@endphp
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header my-back-navbarleft text-light">{{ __('Dashboard') }}</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>Hi {{ $user->name }}! Welcome!</h2>
                        <p>You signed in with the following email: <strong>{{ $user->email }}</strong></p>
                    </div>
                    <div>
                        @if ($user->restaurant)
                            <div class="my-5 text-center">
                                <h4>Here are your general details: </h4>
                                <p>Your restaurant: <strong>{{ $user->restaurant->restaurant_name }}</strong></p>
                                <p>Your restaurant address: <strong>{{ $user->restaurant->street }}</strong></p>
                                <img src="{{ asset('storage/' . $user->restaurant->image) }}" alt="restaurant logo"
                                    class="w-25">

                                <div class="mt-3">
                                    Delete Your Account:
                                    <form action="{{ route('profile.destroy') }}" class="d-inline-block" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger delete-btn mx-2" type="submit"
                                            data-title="your restaurant? If you proceed, your account will also be deleted. Do you wish to continue?">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>




                {{-- <div>
                        <h2>Todolist</h2>
                    <div class="mt-5">
                        <h3>Modifica dei propri dati</h3>
                    </div>
                    <div class="mt-5">
                        <h3>Lista ordini con bottone per lista</h3>
                        <hr>
                        <h3>Se vuoto scrivo che non ci sono ancora ordini senza bottone per la page</h3>
                    </div>
                    <div class="mt-5">
                        <h3>Menú dei piatti</h3>
                    </div>
                    Fixare slug dentro form edit e create ristorante
                </div> --}}
            </div>
        </div>
    </div>
    @include('partials.delete_modal')
@endsection
