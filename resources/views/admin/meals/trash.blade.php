@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Menú</h2>

        <div class="text-end">
            <form action="{{ route('admin.meals.trash.deleteall') }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger mx-2 delete-btn" type="submit" data-title=" all meals? There is no going back">Delete all</button>
            </form>
        </div>


        @if (count($meals) > 0)
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        {{-- <th scope="col">Id</th> --}}
                        <th scope="col">Name</th>
                        <th>Details</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meals as $meal)
                        <tr>
                            {{-- <th scope="row">{{$meal->id}}</th> --}}
                            <td>{{ $meal->name }}</td>
                            <td>
                                <form action="{{ route('admin.meals.trash.restore', ['meal' => $meal->slug]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-outline-info mx-2" type="submit">
                                        <i class="fa-solid fa-recycle"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.meals.trash.delete', ['meal' => $meal->slug]) }}"
                                    class="d-inline-block" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger delete-btn mx-2" type="submit"
                                        data-title="{{ $meal->name }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning mt-2">
                <p>No deleted meals available</p>
            </div>
        @endif
    </div>
    @include('partials.delete_modal')
@endsection