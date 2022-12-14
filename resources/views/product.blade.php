@extends('layouts.master')
<style>
    .row {
        width: 1200px;
        margin-left: auto;
        margin-right: auto;
        display: grid;
        grid-template-columns: auto auto auto auto;
        grid-gap: 10px;
    }

    .item {
        border: 1px solid red;
        padding: 20px 20px;
    }
</style>
@section('content')
{{$total ?? 0}}
<div class="row">
    @foreach($products as $key=>$value)
    <div class="item">
        <p>{{$value->name}}</p>
        <p>{{$value->price}}</p>
        <form action="{{route('addToCart', $value->id)}}" method="POST">
            @csrf
            <button type="submit">ADD</button>
        </form>
    </div>
    @endforeach
</div>
@endsection