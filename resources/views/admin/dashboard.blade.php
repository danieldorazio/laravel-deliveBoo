@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

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
            </div>
        </div>
    </div>
@endsection