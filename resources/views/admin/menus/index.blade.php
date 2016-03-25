@extends('......layouts.admin.master')
@section('title','Show menus')
@section('content')
@if(isset($status))
<div class="text-center text-green">{{$status}}</div>
@endif
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Target</th>
            <th>Parent</th>
            <th>Status</th>
            <th colspan="2" class="text-center"> Option</th>
        </tr>
    </thead>
<tbody>
    @foreach($menus as $menu)
    <tr>
         <td>{{$menu->id}}</td>
        <td>{{$menu->title}}</td>
        <td>{{$menu->target}}</td>
        <td>{{$menu->parent_id}}</td>
        <td>{{$menu->status}}
        <td class="text-center">
            <a class="btn btn-primary btn-sm" href="{{url('/admin/menu/edit/'.$menu->id)}}"><i class="fa fa-pencil"></i>Edit</a>
            <a class="btn btn-danger btn-sm" href="{{url('/admin/menu/destroy/'.$menu->id)}}" onClick="return confirm('Delete This Menu?')"><i class="fa fa-times"></i>Delete</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection