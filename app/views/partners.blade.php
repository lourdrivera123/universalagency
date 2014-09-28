@extends('applicant.layouts.default')

@section('title')
<title>Universal Agency | Our Partners</title>
@stop

@section('description')
<meta name="description" content="Universal Agency Partners">
@stop

@section('toptitlebar')
<div class="top-title-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="page-info">
					<h1 class="h1-page-title">Our Partners</h1>
					<h2 class="h2-page-desc">
						Universal Agency is proud to be affiliated with the following organizations:
					</h2>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('body')
<div class="content-wrapper hide-until-loading">
	<div class="body-wrapper">
		<div class="container">
			<div class="row">
				<table class="table hover">
					<tbody>
						@if(count($employers) > 0)
							@foreach($employers as $employer)
							<tr>
								<td class="col-md-2 col-sm-2">
									<center>
										<img src="{{ URL::asset($employer->photo) }}" class="img-circle" style="width:70px; height=70px; "> <br><br>
									</center>
								</td>
								<td class="col-md-10 col-sm-10">
									<h5> <a href="{{ URL::to('employer/'.$employer->id) }}"> {{ $employer->businessname }} </a> </h5>
									<b>Contact #: </b> {{ $employer->phone_number }} <br>
									<i> {{ Str::limit($employer->description, 200) }} </i>
								</td>
							</tr>
							@endforeach
						@endif
						</tbody>
					</table> 
				</div>

				<!-- Pagination -->
				<div class="pagination-container">
					<ul class="pagination">
						<li><a href="" class="prev">&laquo; </a></li>
						<li><a href="#" > 1 </a></li>
						<li><a href="#"  class="current" > 2 </a></li>
						<li><a href="#" > 3 </a></li>
						<li><a href="#" > 4 </a></li>
						<li><a href="#" > 5 </a></li>
						<li><a href="#" > 6 </a></li>
						<li><a href="#" > 7 </a></li>
						<li><a href="#" > 8 </a></li>
						<li><a href="#" > 9 </a></li>
						<li><a href="#" > 10 </a></li>
						<li><a href="" class="next">&raquo;</a></li>
					</ul>
				</div>    <!-- Pagination Ends -->
			</div>
		</div>
	</div>
	@stop

	@section('scripts')
	{{ HTML::script('js/_jq.js') }}
	{{ HTML::script('js/_jquery.placeholder.js')}}
	{{ HTML::script('js/activeaxon_menu.js')}}
	{{ HTML::script('js/animationEnigne.js')}}
	{{ HTML::script('js/bootstrap.min.js')}}
	{{ HTML::script('js/ie-fixes.js')}}
	{{ HTML::script('js/jq.appear.js')}}
	{{ HTML::script('js/jquery.base64.js')}}
	{{ HTML::script('js/jquery.carouFredSel-6.2.1-packed.js')}}
	{{ HTML::script('js/jquery.cycle.js')}}
	{{ HTML::script('js/jquery.cycle2.carousel.js')}}
	{{ HTML::script('js/jquery.easing.1.3.js')}}
	{{ HTML::script('js/jquery.easytabs.js')}}
	{{ HTML::script('js/jquery.infinitescroll.js')}}
	{{ HTML::script('js/jquery.isotope.js')}}
	{{ HTML::script('js/jquery.prettyPhoto.js')}}
	{{ HTML::script('js/jQuery.scrollPoint.js')}}
	{{ HTML::script('js/jquery.themepunch.plugins.min.js')}}
	{{ HTML::script('js/jquery.themepunch.revolution.js')}}
	{{ HTML::script('js/jquery.tipsy.js')}}
	{{ HTML::script('js/jquery.validate.js')}}
	{{ HTML::script('js/jQuery.XDomainRequest.js')}}
	{{ HTML::script('js/kanzi.js') }}
	{{ HTML::script('js/retina.js') }}
	@stop