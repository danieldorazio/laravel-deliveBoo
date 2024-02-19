@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>List of Categories</h2>


        @if (count($categories) > 0)
        <table class="table table-striped mt-5">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Image Category</th>
                <th scope="col">Image Header</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->image_category}}</td>
                    <td>{{$category->image_header}}</td>
                  </tr>
                @endforeach 
            </tbody>
        </table>
        @else
            <div class="alert alert-warning mt-2">
                <p>No categories available</p>
            </div>
        @endif
    </div>
@endsection