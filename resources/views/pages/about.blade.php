@extends('layouts.master')
@section('title', 'Farmties | About Us')
@section('styles')
<style>
	#content ul {
		font-size: 16px;
		list-style: none;
	}

	#content ul li {
		display: inline-block;
		padding: 0 30px;
	}

</style>
@stop
@section('innerclass', 'nopadding')

@section('content')
<div id="about" class="section parallax full-screen dark nomargin noborder" style="background-image: url('/images/parallax/soya.jpg');background-color: #333; background-blend-mode: multiply;" data-stellar-background-ratio="0.4">
	<div class="vertical-middle">
		<div class="container clearfix">

			<div class="col_three_fifth nobottommargin">

				<div class="emphasis-title">
					<h2>About Us</h2>
					<p class="lead topmargin-sm">Inadequate access to market is a major challenge faced by small holder farmers in Nigeria. Farmties bridges the gap between demand and supply in the agricultural value chain by market linkage, community engagement, commodity trading and improved post-harvest technologies.</p>
				</div>

			</div>

		</div>
	</div>
</div>
<div class="col-md-12 nopadding common-height">

	@foreach($services as $service)
	<div class="col-md-3 dark col-padding ohidden" style="background-image: url('{{ asset('images/services/'. $service->path) }}'); background-color: rgba(0,0,0,0.7); background-size: cover; background-repeat: no-repeat; background-blend-mode: multiply;">
		<div>
			<h3 class="uppercase" style="font-weight: 600;">{{ $service->name }}</h3>
			<p style="line-height: 1.8;">{{ $service->description }}</p>  
			<a href="{{ route('services.show', $service->slug) }}" class="button button-border button-light button-rounded uppercase nomargin">Read More</a>

			{{--  
			<i class="icon-thumbs-up bgicon"></i>
			--}}
		</div>
	</div>
	@endforeach

	<div class="clear"></div>

</div>

<div class="clear"></div>
<div class="section nomargin noborder" style="background-image: url('/images/parallax/3.jpg');">
	<div class="heading-block center nobottomborder nobottommargin">
		<h2>"Creating markets, impacting lives…"</h2>
	</div>
</div>

<div class="section parallax full-screen nomargin noborder" style="background-image: url('/images/parallax/forest_in.jpg');" data-stellar-background-ratio="0.4">
	<div class="vertical-middle">
		<div class="container clearfix">

			<div class="col_three_fifth nobottommargin">

				<div class="emphasis-title">
					<h2>Vision</h2>
					<p class="lead topmargin-sm">Make trading commodities user friendly and earn returns, Reduce postharvest loses with improved and cost effective technology, Link farmers to market, Engage rural farmers and stakeholders.</p>
				</div>

			</div>

		</div>
	</div>
</div>

<div class="section parallax full-screen dark nomargin noborder" style="background-image: url('/images/parallax/maize_farm.jpg');background-color: #555; background-blend-mode: multiply;" data-stellar-background-ratio="0.4">
	<div class="vertical-middle">
		<div class="container clearfix">

			<div class="col_two_fifth">
				
			</div>
			<div class="col_three_fifth col_last nobottommargin">

				<div class="emphasis-title">
					<h2>Mission</h2>
					<p class="lead topmargin-sm">Farmties is keen on empowering people to trade in agriculture, with confidence, in an innovative and reliable environment; supported by risk management mechanisms and firm integrity.</p>
				</div>

			</div>

		</div>
	</div>
</div>
<div class="clear"></div>
<div class="section nomargin noborder" style="background-image: url('/images/parallax/3.jpg');">
	<div class="heading-block center nobottomborder nobottommargin">
		<h2>Our Values</h2><br>
		<ul>
			<li>EXCELLENCE</li>
			<li>INNOVATION</li>
			<li>INTEGRITY</li>
			<li>CUSTOMER SATISFACTION</li>
		</ul>
	</div>
</div>
@stop