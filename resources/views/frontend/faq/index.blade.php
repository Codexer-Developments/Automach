@extends('layouts.frontend')
@section('content')
@include('frontend.components.header-two')

@section('single_page_name', 'Frequently asked questions')
@include('frontend.components.inner-header')
@include('frontend.components.social-header')



@include('frontend.faq.questions')








@endsection






