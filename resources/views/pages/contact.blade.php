@extends('layouts.master')
@section('title', 'Farmties | Contact Us')
@section('header')
<!-- Page Title
============================================= -->
<section id="page-title">

	<div class="container clearfix">
		<h1>Contact Us</h1>
		<ol class="breadcrumb">
			<li><a href="{{ route('welcome') }}">Home</a></li>
			<li class="active">Contact Us</li>
		</ol>
	</div>

</section><!-- #page-title end -->
@stop
@section('content')
<div class="container clearfix">

	<!-- Postcontent
	============================================= -->
	<div class="nobottommargin">

		<h3>Send us an Email</h3>

		<div class="col_two_third">

			<form class="nobottommargin" action="{{ route('mailsend') }}" method="POST">

				@csrf

				<div class="col_one_third">
					<label for="name">Name <small>*</small></label>
					<input type="text" name="name" value="" class="sm-form-control" required>
				</div>

				<div class="col_one_third">
					<label for="email">Email <small>*</small></label>
					<input type="email" name="email" value="" class="sm-form-control" required>
				</div>

				<div class="col_one_third col_last">
					<label for="mobile">Phone</label>
					<input type="text" name="mobile" value="" class="sm-form-control" />
				</div>

				<div class="clear"></div>

				<div class="col_full">
					<label for="subject">Subject <small>*</small></label>
					<input type="text" name="subject" value="" class="sm-form-control" required>
				</div>

				<div class="clear"></div>

				<div class="col_full">
					<label for="body">Message <small>*</small></label>
					<textarea class="sm-form-control" name="body" rows="6" cols="30" required></textarea>
				</div>

				<div class="col_full">
					<button class="button button-3d nomargin" type="submit">Send Message</button>
				</div>

			</form>
		</div>

	</div><!-- .postcontent end -->

	<!-- Sidebar
	============================================= -->
	<div class="sidebar col_one_third col_last nobottommargin">

		<address>
			<strong>Headquarters:</strong><br>
			Plot 649 Franca Afegbua Crescent,<br>
			Zone E Extension, Apo, Abuja, Abuja - FCT, Nigeria<br>
		</address>

		<abbr title="Phone Number"><strong>Phone:</strong></abbr>  +(234) 803 276 8437<br>
		<abbr title="Mobile"><strong>Mobile:</strong></abbr>  +(234) 817 595 1788<br>
		<abbr title="Email Address"><strong>Email:</strong></abbr> info@farmties.com

		<div class="widget noborder notoppadding">

			<a href="https://www.facebook.com/farmties" class="social-icon si-small si-dark si-facebook" target="_blank">
				<i class="icon-facebook"></i>
				<i class="icon-facebook"></i>
			</a>

			<a href="https://www.facebook.com/thefarmties" class="social-icon si-small si-dark si-twitter" target="_blank">
				<i class="icon-twitter"></i>
				<i class="icon-twitter"></i>
			</a>

		</div>

	</div><!-- .sidebar end -->

</div>
@stop