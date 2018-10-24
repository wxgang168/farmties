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

<div class="section nomargin noborder" style="background-image: url('/images/parallax/3.jpg');">
	<div class="heading-block center nobottomborder nobottommargin">
		<h2>"Creating markets, impacting lives…"</h2>
	</div>
</div>

@stop