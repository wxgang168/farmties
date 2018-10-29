<div id="top-bar" class="dark" style="overflow: hidden;">

	<div class="container clearfix">

		<div class="col_half nobottommargin">

			<!-- Top Links
			============================================= -->
			<div class="top-links">
				<ul>
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="{{ route('register') }}">Register</a></li>
				</ul>
			</div><!-- .top-links end -->

		</div>

		<div class="col_half fright col_last nobottommargin">

			<!-- Top Social
			============================================= -->
			<div id="top-social scroll-top">
				<p style="text-transform: uppercase;">
					<marquee>
						<ul>
							@foreach($abbreviations as $abbreviation)
								<li>
									{{ 
										$abbreviation->commodity->name . ' (' . $abbreviation->region->abb . ')' . ' -  MaxP - ' . '&#8358;' . $abbreviation->MaxP . ',  MinP - ' . '&#8358;' . $abbreviation->MinP . ',  AveP - ' . '&#8358;' . $abbreviation->AveP . ',  CHG - ' . $abbreviation->CHG . '%' 
									}}
								</li>
							@endforeach
						</ul>
					</marquee>
				</p>
			</div><!-- #top-social end -->

		</div>

	</div>

</div><!-- #top-bar end -->
<div class="clear"></div>