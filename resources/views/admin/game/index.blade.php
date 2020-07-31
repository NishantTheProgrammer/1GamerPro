@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Game</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {!! Form::open(['method'=>'PATCH', 'action'=>['GameController@update', 0]]) !!}
            <div class="modal-body">
            
                {!! Form::hidden('id', '', ['id'=>'id']) !!}
            
                
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Name of Game') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'id'=>'editName']) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    <div class="jumbotron">

        <h1 class="display-4 text-center">Add New game</h1>
        <hr class="my-4">
            {!! Form::open(['method'=>'POST', 'action'=>'GameController@store', 'files'=>true]) !!}
                
            
                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                {!! Form::label('photo', 'Game Image') !!}
                {!! Form::file('photo', ['required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('photo') }}</small>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Name of Game') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                {!! Form::submit('Add Game', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
    </div>
    @if (session()->exists('update_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('update_success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->exists('delete_success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session()->get('delete_success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container  rounded d-flex justify-content-center">
        <div class="row hidden-md-up">
        @foreach ($games as $game)
            <div class="card col-xl-3 col-lg-4 col-md-6 col-sm-12">
            <img src="{{asset($game->img)}}" class="card-img-top" alt="{{"$game->name image"}}">
                <div class="card-body">
                <h5 class="card-title">{{ $game->name}}</h5>
                <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                onclick="{
                    document.querySelector('#editName').value = '{{$game->name}}';
                    document.querySelector('#id').value = '{{$game->id}}';
                    }"
                
                >Edit</button>
                
                {!! Form::open(['method'=>'DELETE', 'action'=>['GameController@destroy', $game->id], 'onsubmit'=>"return confirm('Are you sure? DELETE: $game->name')", 'class'=>'d-inline']) !!}
                    
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                
                </div>
            </div>
        @endforeach
        </div>
    </div>




@endsection