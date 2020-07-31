@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="jumbotron">

        <h1 class="display-4 text-center">Dashboard</h1>
        <hr class="my-4">

        <div class="row hidden-md-up">
          <div class="card col-xl-3 col-lg-4 col-md-6 col-sm-12 d-flex align-items-center text-center">
              <div class="card-body">
                <h5 class="card-title">Users</h5>
              <h1 class="display-2">{{$user_c}}</h1>
              <a href="{{url('/admin/users')}}" class="btn btn-primary">Details</a>
              </div>
          </div>
          
          <div class="card col-xl-3 col-lg-4 col-md-6 col-sm-12 d-flex align-items-center text-center">
              <div class="card-body">
                <h5 class="card-title">Games</h5>
              <h1 class="display-2">{{$game_c}}</h1>
                <a href="{{url('/admin/games')}}" class="btn btn-primary">Details</a>
              </div>
          </div>

          <div class="card col-xl-3 col-lg-4 col-md-6 col-sm-12 d-flex align-items-center text-center">
              <div class="card-body">
                <h5 class="card-title">Tournaments</h5>
              <h1 class="display-2">{{$tournament_c}}</h1>
                <a href="{{url('/admin/tournaments')}}" class="btn btn-primary">Details</a>
              </div>
          </div>
        </div>
        


    </div>






@endsection