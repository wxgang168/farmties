@extends('layouts.master')
@section('header')
<!-- Page Title
============================================= -->
<section id="page-title">

	<div class="container clearfix">
		<h1>{{ $service->name }}</h1>
		<ol class="breadcrumb">
			<li><a href="{{ route('welcome') }}">Home</a></li>
			<li class="active">{{ $service->name }}</li>
		</ol>
	</div>

</section><!-- #page-title end -->
@stop
@section('content')
<div class="container clearfix">
	<div class="col_full">
		<div class="custom_style">
			<div class="service-img" style="height: 250px; overflow: hidden;">
				<img src="{{ asset('images/services/'.$service->path) }}" alt="" class="img-fluid">
			</div><br><br>
			{!! $service->body !!} 
		</div>
	</div>
</div>
@stop