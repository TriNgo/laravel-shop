@extends('layouts.admin.master')
@section('title','Add menus')
@section('content')
{!! Form::open(array('url' => 'admin/menu/update/'.$edit_menus->id, 'method' => 'post', 'id' => 'form-add-menu', 'name' => 'form-add-menu','files' => true)) !!}
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
    {!! Form::text('title',$edit_menus->title, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('menu_url', 'URL') !!}
    {!! Form::text('url_menu',$edit_menus->url, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
{!! Form::label('parent_menu', 'Parent') !!} &nbsp;
    <select name="parent_id" id="parent_id" class="form-control">
    $messages = $validator->errors();
        <option value="0">None</option>
        @foreach($list_menus as $list_menu)
        <option value="{{$list_menu->id}}" @if($list_menu->id == $edit_menus->parent_id) : selected="selected" @endif>{{$list_menu->title}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
{!! Form::label('target_menu', 'Target') !!} &nbsp;
    <select name="target" id="target_menu" class="form-control">
        <option value="_self" @if($edit_menus->target == '_self') : selected="selected" @endif>Self</option>
        <option value="_blank" @if($edit_menus->target == '_blank') : selected="selected" @endif>Blank</option>
        <option value="_parent" @if($edit_menus->target == '_parent') : selected="selected" @endif>Parent</option>
        <option value="_top" @if($edit_menus->target == '_top') : selected="selected" @endif>Top</option>
    </select>
</div>
<div class="form-group">
    {!! Form::label('lbl_status', 'Show') !!}
    @if($edit_menus->status == 1)
    {!! Form::checkbox('status', '1', array('checked'=>true)) !!}
    @else
    {!! Form::checkbox('status', '1') !!}
    @endif
</div>
{!! Form::submit('Save', array('id'=>'btn-submit', 'class' => 'btn btn-primary')) !!}
{!! Form::close() !!}
@endsection