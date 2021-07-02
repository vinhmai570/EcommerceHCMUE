@extends('layouts.frontend')
@include('frontend.home.components.header')
@section('content')
    @include('frontend.home.components.slide')
    @include('frontend.home.components.popular_product')
    @include('frontend.home.components.banner')
    {{-- @include('frontend.home.components.best_seller_product') --}}
    @include('frontend.home.components.bottom_product')
@endsection
