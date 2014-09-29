@extends('admin.layouts.default')

@section('ribbon')
<!-- RIBBON -->
<div id="ribbon">
	
	<a href="">
		<span class="ribbon-button-alignment"> 
			<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
				<i class="fa fa-refresh"></i>
			</span> 
		</span>
	</a>

	<ol class="breadcrumb">
		<li>Admin</li><li>Reports</li>
	</ol>
</div>
@stop

@section('maincontent')
<div id="content">
	<section id="widget-grid" class="">
		<div class="row">
			
		</div>
	</section>
</div>
@stop