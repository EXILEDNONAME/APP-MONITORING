@extends('layouts.backend.__templates.show', ['active' => 'true'])
@section('title', 'Access Points')

@section('table-header')
<tr>
    <td class="align-middle font-weight-bold"> Name </td>
    <td> {{ $data->name }} </td>
</tr>
<tr>
    <td class="align-middle font-weight-bold"> Device </td>
    <td> {{ $data->device }} </td>
</tr>
<tr>
    <td class="align-middle font-weight-bold"> IP Address </td>
    <td> {{ $data->ip_address }} </td>
</tr>
<tr>
    <td class="align-middle font-weight-bold"> MAC Address </td>
    <td> {{ $data->mac_address }} </td>
</tr>
<tr>
    <td class="align-middle font-weight-bold"> Port </td>
    <td> {{ $data->port }} </td>
</tr>
<tr>
    <td class="align-middle font-weight-bold"> Description </td>
    <td> {{ $data->description }} </td>
</tr>
@endsection