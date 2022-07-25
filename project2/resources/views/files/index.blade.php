@extends('layouts.app')
@section('content')
<style>
    i{
        font-size: 25px;
    }
</style>

    <h1 class="text-center text-info"> List Files</h1>
    @if (Session::has('done'))
    <div class="alert alert-success">
        {{ Session::get('done') }}
    </div>
@endif
    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <table class="table table-success">
<tr>
    <td>File Title</td>
    <td>Action</td>
</tr>
@foreach ($files as $data )
<tr>
    <td> {{$data->title}}</td>
    <td><a href="{{route("file.show",$data->id)}}" class="text-primary"> <i class="fa-regular fa-eye"></i></a> </td>
    <td> <a href="{{route("file.edit",$data->id)}}" class="text-info"><i class="fa-regular fa-pen-to-square"></i> </a></td>
    <td> <a href="{{route("file.destroy",$data->id)}}" class="text-danger"> <i class="fa-solid fa-trash-can"></i></a> </td>
</tr>
@endforeach


                </table>
            </div>
        </div>
    </div>
@endsection
