@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="jumbotron">
        <h1 class="display-3 text-center">Users</h1>
        <hr class="my-4">
        @if (count($users) > 0)
            
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email ID</th>
              </tr>
            </thead>
            @foreach ($users as $user)
                <tbody>
                <tr>
                    <th scope="row">{{$loop->index + 1 }}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
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