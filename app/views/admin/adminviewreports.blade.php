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
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
						<h2>Sales Graph</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							<input type="text">
						</div>
						<div class="widget-body no-padding">
							<div id="sales-graph" class="chart no-padding"></div>
						</div>
					</div>
				</div>
			</article>
			<!-- WIDGET END -->
		</div>
	</section>
</div>
@stop

@section('additional_scripts')
<script src="js/plugin/morris/raphael.min.js"></script>
<script src="js/plugin/morris/morris.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		pageSetUp();

		if ($('#sales-graph').length) {

			Morris.Area({
				element : 'sales-graph',
				data : [{
					period : '2010 Q1',
					iphone : 2666
				}, {
					period : '2010 Q2',
					iphone : 2778
				}, {
					period : '2010 Q3',
					iphone : 4912
				}, {
					period : '2010 Q4',
					iphone : 3767
				}, {
					period : '2011 Q1',
					iphone : 6810
				}, {
					period : '2011 Q2',
					iphone : 5670
				}, {
					period : '2011 Q3',
					iphone : 4820
				}, {
					period : '2011 Q4',
					iphone : 15000
				}, {
					period : '2012 Q1',
					iphone : 10687
				}, {
					period : '2012 Q2',
					iphone : 8432
				}],
				xkey : 'period',
				ykeys : ['iphone'],
				labels : ['iPhone'],
				pointSize : 2,
				hideHover : 'auto'
			});
	}
});
</script>
@stop