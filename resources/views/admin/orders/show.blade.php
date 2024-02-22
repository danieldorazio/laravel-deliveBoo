@extends('layouts.admin')

@section('content')

<h2>Ordered Meals: </h2>

<table class="table table-striped mt-5">
    <thead>
      <tr>
        {{-- <th scope="col">Id</th> --}}
        <th scope="col">Name</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($meals as $meal)
            <tr>
            <td>{{$meal->name}}</td>
            <td>             
                @if ($meal->description)
                 {{$meal->description}}
            @else
                <p>
                    <strong>Description : Not available </strong>
                </p>
            @endif              
            </td>
            <td>
              @foreach ($array as $item)
              @if ($item->meal_id === $meal->id)
                  {{$item->quantity}}
              @endif                   
              @endforeach                   
            </td>
            <td>{{$meal->price}}€</td>          
            </tr>
        @endforeach
            <td colspan=3></td>
            <td>
                <div class="btn btn-info">
                         Total price: 
                        {{$total_price}}€
                </div>
                
            </td>
            
        
    </tbody>
    
</table>

    

@endsection


