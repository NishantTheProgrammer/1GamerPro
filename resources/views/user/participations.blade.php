@extends('layouts.user')

@section('name')
    My Paritcipations
@endsection


@section('content')
<div class="container">

    <div class="jumbotron table-responsive-lg">
        @if (count($participations) > 0)
            
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Fee Paid</th>
                <th scope="col">Game</th>
                <th scope="col">Tournament</th>
                <th scope="col">Tournament Time</th>
              </tr>
            </thead>
            @foreach ($participations as $participation)
                <tbody>
                <tr>
                    <th scope="row">{{$loop->index + 1 }}</th>
                    <td>{{$participation->tournament->entry_fee}}</td>
                    <td>{{$participation->tournament->game->name}}</td>
                    <td>{{$participation->tournament->title}}</td>
                    <td>{{$participation->tournament->t_timing}}</td>
                </tr>
                </tbody>
                
            @endforeach
          </table>
        @else
          <h1 class="text-dark">No participation yet</h1>
            
        @endif
      </div>
</div>
@endsection