@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header my-back-navbarleft text-light">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>Hi {{Auth::user()->name}}! Welcome!  </h2>
                        <p>You signed in with the following email: {{Auth::user()->email}}</p>
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
                </div> --}}
            </div>
        </div>
    </div>
@endsection