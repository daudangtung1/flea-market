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
<div class="row">
    @foreach($cart as $data)

    <div style="margin-bottom: 10px;">
        <p>{{$data->name}}</p>
        <p>{{$data->price}}</p>
        <p>{{$data->qty}}</p>
        <form action="{{route('product.cart.remove', $data->rowId)}}" method="POST">
            @csrf
            <input type="hidden" value="{{$data->rowId}}" name="rowId">
            <button type="submit">delete</button>
        </form>
    </div>

    @endforeach
</div>

<div style="border: 1px solid green; width: 1000px; margin: 10px auto;">
    <p>Total without taxt: {{$total}}</p>
    <p>Total with taxt: {{$total_taxt}}</p>
    <form action="{{route('product.cart.removeAll')}}" method="POST">
        @csrf
        <button type="submit">delete all</button>
    </form>
</div>
@endsection