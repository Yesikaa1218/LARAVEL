@extends('errors::illustrated-layout')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
@section('image')
<img src="{{asset('front/assets/images/404.png')}}" class="img-fluid pt-5" style="max-width: 800px; max-height:800px;"></img>
@endsection