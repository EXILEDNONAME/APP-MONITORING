@extends('layouts.backend.__templates.index', ['active' => 'true'])
@section('title', 'Access Points')

@section('table-header')
<th> Name </th> 
<th> Device </th> 
<th> IP Address </th> 
<th> MAC Address </th> 
<th> Port </th> 
<th> Description </th> 
@endsection

@section('table-body')
{ data: 'name' }, 
{ data: 'device' }, 
{ data: 'ip_address' }, 
{ data: 'mac_address' }, 
{ data: 'port' }, 
{ data: 'description' }, 
@endsection