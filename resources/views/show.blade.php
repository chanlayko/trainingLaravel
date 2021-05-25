@extends('layout')

@section('contant')
    <div class="card">
        <div class="card-header">
            <h3>Post Contant </h3>
        </div>
        <div class="card-body">
            <div class="">
                <h5> {{ $post -> name }} </h5>
            </div>
            <div class="">
                <p> {{ $post -> description }} </p>
            </div>
            <div class="" style="font-style:italic;">
                {{ 'Category : '.$post->categories->name }}
            </div>
            <br>
            <div class="form-group">
                <a href="/post" class="btn btn-success">Back</a>
            </div>
        </div>
    </div>
@endsection