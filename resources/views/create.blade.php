@extends('layout')

@section('contant')
    <div class="card">
        <div class="card-header">
            <h3>Post Contant </h3>
        </div>
        <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="">
                <form action="/post" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Place Enter Your Name">
                    </div>
                    <!-- @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="description" class="form-control" id="desc" cols="30" rows="3" placeholder="Place Enter Description">{{ old('description') }}</textarea>
                    </div>
                    <!-- @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->
                    <div class="form-gorup">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/post" class="btn btn-success">Black</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection