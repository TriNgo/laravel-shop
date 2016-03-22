@extends('layouts.admin.master')
@section('title','Add menus')
@section('content')
{!! Form::open(array('url' => '/admin/menu/postadd', 'method' => 'post', 'id' => 'form-add-menu', 'name' => 'form-add-menu','files' => true)) !!}
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
    <select name="parent_name" id="parent_id" class="form-control">
        <option value="0">None</option>
        <option value="1">a</option>
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
    {!! Form::label('status_menu', 'Status') !!}
    <select name="status" id="menu_status" class="form-control">
        <option value="1">Enable</option>
        <option value="0">Disable</option>
    </select>
</div>
{!! Form::submit('Save', array('id'=>'btn-submit', 'class' => 'btn btn-primary')) !!}
{!! Form::close() !!}
@endsection