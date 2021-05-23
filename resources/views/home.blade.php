@extends('layout')

@section('contant')
<div>
    <h3>Home Page</h3>
</div>
<div>
    <div class="card">
        <div class="cart-header">
            Blog Lession
        </div>
        <div class="card-body">
            @foreach($data as $post)
            <h5 class="card-title">{{ $post -> name }} </h5>
            <p> {{ $post -> description }} </p>
            @endforeach
        </div>
    </div>
</div>
@endsection