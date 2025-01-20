@extends('layouts.frontend')
@section('content')
@include('frontend.components.header')
@include('frontend.home.slider')
@include('frontend.home.filter')
@include('frontend.home.widget')
@include('frontend.home.category')
@include('frontend.home.inquery')
@include('frontend.home.cards')
{{-- @include('frontend.home.recommend') --}}
@include('frontend.home.banner')
@include('frontend.home.bodyType')










@endsection