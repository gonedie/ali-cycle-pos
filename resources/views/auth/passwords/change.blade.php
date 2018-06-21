@extends('layouts.app')

@section('title', trans('auth.change_password'))

@section('content')
<h3 class="page-header">{{ trans('auth.change_password') }}</h3>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title">{{ trans('auth.change_password') }}</h3></div>
      {!! Form::open(['route'=>'change-password']) !!}
      <div class="panel-body">
        {!! FormField::password('old_password', ['label'=> trans('auth.old_password')]) !!}
        {!! FormField::password('password', ['label'=>trans('auth.new_password')]) !!}
        {!! FormField::password('password_confirmation', ['label'=>trans('auth.new_password_confirmation')]) !!}
      </div>
      <div class="panel-footer">
        {!! Form::submit(trans('auth.change_password'), ['class'=>'btn btn-info']) !!}
        {!! link_to_route('dashboard.index',trans('app.cancel'),[],['class'=>'btn btn-default']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
