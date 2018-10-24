@extends('layouts.master')
@section('title', 'Farmties | About Us')
@section('styles')
<style>
	ul {
		padding-left: 40px; 
		font-size: 16px;
	}

</style>
@stop
@section('header')
<!-- Page Title
============================================= -->
<section id="page-title">

	<div class="container clearfix">
		<h1>About Us</h1>
		<ol class="breadcrumb">
			<li><a href="{{ route('welcome') }}">Home</a></li>
			<li class="active">About Us</li>
		</ol>
	</div>

</section><!-- #page-title end -->
@stop

@section('content')
<div class="container clearfix">

	<div class="col_full">
		<p class="lead">
			Inadequate access to market is a major challenge faced by small holder farmers in Nigeria. Farmties bridges the gap between demand and supply in the agricultural value chain by market linkage, community engagement, commodity trading and improved post-harvest technologies.
		</p>
	</div>

	<div class="col_half">

		<div class="heading-block fancy-title nobottomborder title-bottom-border">
			<h4>Our <span>Vison</span>.</h4>
		</div>

		<p>
			Farmties is keen on empowering people to trade in agriculture, with confidence, in an innovative and reliable environment; supported by risk management mechanisms and firm integrity.
		</p>

	</div>

	<div class="col_half col_last">

		<div class="heading-block fancy-title nobottomborder title-bottom-border">
			<h4>Our <span>Mission</span>.</h4>
		</div>

		<p>
			Make trading commodities user friendly and earn returns, Reduce postharvest loses with improved and cost effective technology, Link farmers to market, Engage rural farmers and stakeholders.
		</p>

	</div>

	<div class="col_full">
		<h3>Mantra</h3>
		<p class="lead">
			Creating markets, impacting lives…
		</p>
	</div>

	<div class="col_full">
		<h3>Value</h3>
		<ul>
			<li>Excellence</li>
			<li>Inovation</li>
			<li>Integrity</li>
			<li>Customer Satisfaction</li>
		</ul>
	</div>
	
</div>

{{--  
<div class="section nomargin">
	<div class="container clearfix">

		<div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
			<i class="i-plain i-xlarge divcenter icon-line2-directions"></i>
			<div class="counter counter-lined"><span data-from="100" data-to="846" data-refresh-interval="50" data-speed="2000"></span>K+</div>
			<h5>Lines of Codes</h5>
		</div>

		<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
			<i class="i-plain i-xlarge divcenter nobottommargin icon-line2-graph"></i>
			<div class="counter counter-lined"><span data-from="3000" data-to="15360" data-refresh-interval="100" data-speed="2500"></span>+</div>
			<h5>KBs of HTML Files</h5>
		</div>

		<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
			<i class="i-plain i-xlarge divcenter nobottommargin icon-line2-layers"></i>
			<div class="counter counter-lined"><span data-from="10" data-to="408" data-refresh-interval="25" data-speed="3500"></span>*</div>
			<h5>No. of Templates</h5>
		</div>

		<div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
			<i class="i-plain i-xlarge divcenter nobottommargin icon-line2-clock"></i>
			<div class="counter counter-lined"><span data-from="60" data-to="1200" data-refresh-interval="30" data-speed="2700"></span>+</div>
			<h5>Hours of Coding</h5>
		</div>

	</div>
</div>
--}}

@stop