@extends('layouts.master')
@section('title', 'Register')
@section('content')
<div>
    <a href="{{route('auth.register-download-member.index')}}">Download member register</a>
    <br>
    <a href="{{route('auth.register-affiliate-member.index')}}">Affiliate member register</a>
</div>
@endsection