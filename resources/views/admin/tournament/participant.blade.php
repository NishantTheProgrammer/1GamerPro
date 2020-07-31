@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="jumbotron">
        <h1 class="display-3">{{$tournament->game->name}}</h1>
    <h1 class="display-4">{{$tournament->title}}</h1>
        <p class="lead">{{$tournament->description}}</p>
        <hr class="my-4">
        @if (count($participants) > 0)
            
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">User Email</th>
                <th scope="col">Time of purchase</th>
              </tr>
            </thead>
            @foreach ($participants as $participant)
                <tbody>
                <tr>
                    <th scope="row">{{$loop->index + 1 }}</th>
                    <td>{{$participant->user->email}}</td>
                    <td>{{$participant->created_at}}</td>
                </tr>
                </tbody>
                
            @endforeach
          </table>
        @else
          <h1>Noboddy participated yet</h1>
            
        @endif
      </div>
</div>
@endsection