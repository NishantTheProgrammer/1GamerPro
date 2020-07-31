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

        <h1 class="display-4 text-center">Add a new tournament</h1>
        <hr class="my-4">

        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    New Tournament
                  </button>
                </h2>
              </div>
          
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'TournamentController@store', 'files'=>true]) !!}
                        
                    
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">Tournament Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            
                            <div class="col-md-6 form-group{{ $errors->has('game_id') ? ' has-error' : '' }}">
                            {!! Form::label('game_id', 'Select Game') !!}
                            {!! Form::select('game_id',$games, null, ['id' => 'game_id', 'class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('game_id') }}</small>
                            </div>
                        </div>
                            
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {!! Form::label('description', 'Tournament Description') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'rows'=>3]) !!}
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div>

                        

                        <div class="form-row">
                            <div class="col-md-6 form-group{{ $errors->has('entry_fee') ? ' has-error' : '' }}">
                                {!! Form::label('entry_fee', 'Entry Fee') !!}
                                {!! Form::number('entry_fee', null, ['class' => 'form-control ', 'required' => 'required', 'step'=>'0.01']) !!}
                                <small class="text-danger">{{ $errors->first('entry_fee') }}</small>
                                </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('t_timing', 'Entry Fee') !!}

                                {{ Form::input('dateTime-local', 't_timing', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        
                        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        
                    {!! Form::close() !!}
                </div>
              </div>
            </div>
        </div>


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

    @foreach ($tournaments as $tournament)
        <div class="container bg-dark rounded d-flex text-light my-3 p-5">
            <div class="media w-100">
                <img src="{{$tournament->game->img}}" class="mr-5" alt="{{$tournament->game->name}} image" style="width: 150px; border-radius: 20px;">
                <div class="media-body">
                <h2 class="mt-0">{{ $tournament->title}}</h2>
                <p><strong>Entry Fee{{ $tournament->entry_fee}}</strong></p>
                <p>{{ $tournament->description}}</p>
                </div>
                <div>
                <a href="{{ url("admin/participant/$tournament->id")}}" class="btn btn-secondary">Participants</a>
                <a href="{{ url("admin/tournaments/$tournament->id/edit")}}" class="btn btn-primary">Update</a>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['TournamentController@destroy', $tournament->id], 'onsubmit'=>"return confirm('Are you sure? DELETE: $tournament->title')", 'class'=>'d-inline']) !!}
                    
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endforeach




@endsection