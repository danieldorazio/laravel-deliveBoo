@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>List of Meals</h2>


        @if (count($meals) > 0)
        <table class="table table-striped mt-5">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($meals as $meal)
                    <tr>
                    <th scope="row">{{$meal->id}}</th>
                    <td>{{$meal->name}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('admin.meals.show', ['meal' => $meal->slug]) }}">Details</a>
                    </td>
                  </tr>
                @endforeach 
            </tbody>
        </table>
        @else
            <div class="alert alert-warning mt-2">
                <p>No meals available</p>
            </div>
        @endif
    </div>
@endsection