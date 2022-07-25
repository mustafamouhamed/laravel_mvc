@extends('layouts.app')
@section('content')
<h1 class="text-center text-info">  Edit Files {{$file->title}}</h1>
<div class="container col-6">

    <div class="card">
        <div class="card-body">
            <form action="{{ route('file.update',$file->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>File Title</label>
                    <input type="text" value="{{$file->title}}" class="form-control @error('title') is-invalid @enderror" name="title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                </div>
                <div class="form-group">
                    <label>File description</label>
                    <input type="text" value="{{$file->description}}"  class="form-control @error('description') is-invalid @enderror" name="description">
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label> Upload your File  : {{$file->file}} </label>
                    <input type="file" class="form-control btn btn-info @error('file') is-invalid @enderror" name="fileInput">
                    @error('fileInput')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <button class="btn btn-primary"> Upload File</button>
            </form>
        </div>
    </div>
</div>
@endsection
