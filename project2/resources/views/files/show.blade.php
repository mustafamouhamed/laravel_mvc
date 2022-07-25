@extends('layouts.app')
@section('content')
<h1 class="text-center text-info">  show Files {{$file->title}}</h1>
<div class="container col-6">

    <div class="card">
        File Title :{{$file->title}}
        <div class="card-body">
File Description : {{$file->description}}
FileName : {{$file->file}}
        </div>
        <a href="{{route("file.Download",$file->id)}}" class="btn btn-success"> <i class="fa-regular fa-circle-down"></i> Download</a>
    </div>
</div>
@endsection
