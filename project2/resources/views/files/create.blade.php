@extends('layouts.app')
@section('content')
    <h1 class="text-center text-info"> Create Files</h1>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}


    @if (Session::has('done'))
        <div class="alert alert-success">
            {{ Session::get('done') }}
        </div>
    @endif
    <div class="container col-6">

        <div class="card">
            <div class="card-body">
                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>File Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                    </div>
                    <div class="form-group">
                        <label>File description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description">
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label> Upload your File </label>
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
