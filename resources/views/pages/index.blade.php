@extends('layouts.master')
{{--  
@section('header')
<section id="slider" class="slider-parallax swiper_wrapper clearfix">

	<div class="swiper-container swiper-parent">
		<div class="swiper-wrapper">

			@foreach($sliders as $slider)
			<div class="swiper-slide dark" style="background-image: url('{{ asset('images/sliders/'.$slider->path) }}');">
				<div class="container clearfix">
					<div class="slider-caption slider-caption-center">
						<h2 data-caption-animate="fadeInUp">{{ $slider->title }}</h2>
						<p data-caption-animate="fadeInUp" data-caption-delay="200">{{ $slider->description }}</p>
					</div>
				</div>
			</div>
			@endforeach

		</div>
		<div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
		<div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
		<div id="slide-number"><div id="slide-number-current"></div><span>/</span><div id="slide-number-total"></div></div>
	</div>

</section>

@stop
--}}
@section('innerclass', 'nopadding')
@section('content')
<div class="section parallax dark nomargin noborder" style="padding: 150px 0; background-image: url('/images/parallax/paddy.jpg');" data-stellar-background-ratio="0.4">
	<div class="container center clearfix">

		<div class="emphasis-title">
			<h2>Commodity Trading</h2>
			<p class="lead topmargin-sm">Earn returns trading agricultural commodities.</p>
		</div>

		<a href="{{ route('user.dashboard') }}" class="button button-border button-rounded button-light button-large">Start Trading</a>

	</div>
</div>

<div id="about" class="section parallax full-screen nomargin noborder" style="background-image: url('/images/parallax/soya.jpg');" data-stellar-background-ratio="0.4">
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

<div class="section parallax full-screen dark nomargin noborder" style="background-image: url('/images/parallax/barn.jpg');" data-stellar-background-ratio="0.4">
	<div class="vertical-middle">
		<div class="container clearfix">

			<div class="row">

				<div class="col-md-3 bottommargin-sm center" data-animate="bounceIn">
					<i class="i-plain i-xlarge divcenter nobottommargin icon-time"></i>
					<div class="counter counter-large counter-lined"><span data-from="0" data-to="100" data-refresh-interval="50" data-speed="2000"></span>%</div>
					<h5>Excellence</h5>
				</div>

				<div class="col-md-3 bottommargin-sm center" data-animate="bounceIn" data-delay="200">
					<i class="i-plain i-xlarge divcenter nobottommargin icon-settings"></i>
					<div class="counter counter-large counter-lined"><span data-from="0" data-to="100" data-refresh-interval="100" data-speed="2500"></span>%</div>
					<h5>Innovation</h5>
				</div>

				<div class="col-md-3 bottommargin-sm center" data-animate="bounceIn" data-delay="400">
					<i class="i-plain i-xlarge divcenter nobottommargin icon-file-text"></i>
					<div class="counter counter-large counter-lined"><span data-from="0" data-to="100" data-refresh-interval="25" data-speed="3500"></span>%</div>
					<h5>Integrity</h5>
				</div>

				<div class="col-md-3 bottommargin-sm center" data-animate="bounceIn" data-delay="600">
					<i class="i-plain i-xlarge divcenter nobottommargin icon-user"></i>
					<div class="counter counter-large counter-lined"><span data-from="0" data-to="100" data-refresh-interval="30" data-speed="2700"></span>%</div>
					<h5>Customer Satisfaction</h5>
				</div>

			</div>

		</div>
	</div>
</div>

<div class="section nomargin noborder" style="background-image: url('/images/parallax/3.jpg');">
	<div class="heading-block center nobottomborder nobottommargin">
		<h2>"Creating markets, impacting lives…"</h2>
	</div>
</div>

<div class="section parallax full-screen dark nomargin noborder" style="background-image: url('/images/parallax/maize_farm.jpg');" data-stellar-background-ratio="0.4">
	<div class="vertical-middle">
		<div class="container clearfix">

			<div class="col_three_fifth nobottommargin">

				<div class="emphasis-title">
					<h2>Vision</h2>
					<p class="lead topmargin-sm">Farmties is keen on empowering people to trade in agriculture, with confidence, in an innovative and reliable environment; supported by risk management mechanisms and firm integrity.</p>
				</div>

			</div>

		</div>
	</div>
</div>

@stop