@extends('layouts.user')

@section('name')
    User Profile
@endsection

@section('content')

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    {!! Form::open(['method' => 'POST', 'action' => 'UserController@addMoney', 'class' => 'modal-dialog modal-dialog-centered', 'role'=>'document']) !!}
    
    

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            

            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
            {!! Form::label('amount', 'Enter Amount') !!}
            {!! Form::number('amount', null, ['class' => 'form-control', 'required' => 'required', 'step'=>'0.01']) !!}
            <small class="text-danger">{{ $errors->first('amount') }}</small>
            </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
        </div>
      </div>

    
    {!! Form::close() !!}
  </div>  
 



<div class="container">
    
    @if (session()->has('moneyAdded'))
        
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>$ {{session()->get('moneyAdded')}}</strong> Successfully add to your account
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif


    @if (session()->has('lowBal'))
        
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session()->get('lowBal')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif




    <div class="jumbotron">
        <h1 class="display-4 text-dark">Hello, {{Auth::user()->name}}</h1>
        <p class="lead text-dark">We are grateful for your support, Thanks to be with us!</p>
    <h1 class="text-dark display-5">$ {{Auth::user()->balance}}</h1>
        <button type="button" class="btn btn-primary btn-lg " style="font-family: Arial" data-toggle="modal" data-target="#exampleModalCenter">
            Add Money
            </button>
        <hr class="my-4">

        {!! Form::open(['method' => 'PATCH', 'url'=>"/profile/" . Auth::user()->id, 'class' => 'form-inline']) !!}
        
            <div class"form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            
            {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'New Password']) !!}
            <small class="text-danger">{{ $errors->first('password') }}</small>
            </div>


        
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        
    </div>
</div>
@endsection