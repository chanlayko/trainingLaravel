@extends('layout')

@section('contant')
    <div class="card">
        <div class="card-header">
            <h3>Post Contant <a href="/post/create" class="btn btn-success">New Post</a> <a href="logout" class="btn btn-primary">Logout</a></h3>
        </div>
        <div class="card-body">
            @foreach($data as $post)
                <div class="">
                    <h5> {{ $post -> name }} </h5>
                </div>
                <div class="">
                    <p> {{ $post -> description }} </p>
                </div>
                <div class="form-row">
                    <a href="/post/{{ $post -> id }}" class="btn btn-primary" style="margin-right:10px;">View More</a>
                    <a href="/post/{{ $post -> id }}/edit" class="btn btn-warning" style="margin-right:10px;">Edit</a>
                    <form action="/post/{{$post ->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection