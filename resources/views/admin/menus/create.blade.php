@extends('layouts.admin.master')
@section('title','Add menus')
@section('content')
{!! Form::open(array('url' => '/admin/menu/postadd', 'method' => 'post', 'id' => 'form-add-menu', 'name' => 'form-add-menu','files' => true)) !!}
@if ( $errors->any() )
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif
<div class="form-group">
    {!! Form::label('menu_title', 'Name') !!}
    {!! Form::text('title','', array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('menu_url', 'URL') !!}
    {!! Form::text('url_menu','', array('class' => 'form-control')) !!}
</div>
<div class="form-group">
{!! Form::label('parent_menu', 'Parent') !!} &nbsp;
    <select name="parent_id" id="parent_id" class="form-control">
    $messages = $validator->errors();
        <option value="0">None</option>
        @foreach($menus as $menu)
        <option value="{{$menu->id}}">{{$menu->title}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
{!! Form::label('target_menu', 'Target') !!} &nbsp;
    <select name="target" id="target_menu" class="form-control">
        <option value="_self">Self</option>
        <option value="_blank">Blank</option>
        <option value="_parent">Parent</option>
        <option value="_top">Top</option>
    </select>
</div>
<div class="form-group">
    {!! Form::label('lbl_status', 'Show') !!}
    {!! Form::checkbox('status', '1', array('checked'=>true)) !!}
</div>
{!! Form::submit('Save', array('id'=>'btn-submit', 'class' => 'btn btn-primary')) !!}
{!! Form::close() !!}
@endsection