@extends('admin.layouts.default')

@section('ribbon')
<!-- RIBBON -->
<div id="ribbon">
	<span class="ribbon-button-alignment"> 
		
	</span>
	<!-- breadcrumb -->
	<ol class="breadcrumb">
		<li>Admin</li><li>Inbox</li>
	</ol>
	<!-- end breadcrumb -->
</div>
@stop

@section('maincontent')
<div id="content">
	<div class="inbox-nav-bar no-content-padding">
		<h1 class="page-title txt-color-blueDark hidden-tablet">
			<i class="fa fa-fw fa-inbox"></i> Inbox &nbsp;
		</h1>
		
		<div class="btn-group hidden-desktop visible-tablet">
			<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				Inbox <i class="fa fa-caret-down"></i>
			</button>

			<ul class="dropdown-menu pull-left">
				<li>
					<a href="javascript:void(0);" class="inbox-load">Inbox <i class="fa fa-check"></i></a>
				</li>
				<li>
					<a href="javascript:void(0);">Sent</a>
				</li>
				<li>
					<a href="javascript:void(0);">Trash</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="javascript:void(0);">Spam</a>
				</li>
			</ul>
		</div>
				
		<div class="inbox-checkbox-triggered">
			<div class="btn-group">
				<!-- <a href="javascript:void(0);" rel="tooltip" title="" data-placement="bottom" data-original-title="Mark Important" class="btn btn-default"><strong><i class="fa fa-exclamation fa-lg text-danger"></i></strong></a> -->
				<!-- <a href="javascript:void(0);" rel="tooltip" title="" data-placement="bottom" data-original-title="Move to folder" class="btn btn-default"><strong><i class="fa fa-folder-open fa-lg"></i></strong></a> -->
				<a href="javascript:void(0);" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete" class="deletebutton btn btn-default"><strong><i class="fa fa-trash-o fa-lg"></i></strong></a>
			</div>
		</div>
				
		<a href="javascript:void(0);" id="compose-mail-mini" class="btn btn-primary pull-right hidden-desktop visible-tablet"> 
			<strong><i class="fa fa-file fa-lg"></i></strong> 
		</a>
	</div>
			
	<div id="inbox-content" class="inbox-body no-content-padding">
		<div class="inbox-side-bar">
			<a href="javascript:void(0);" id="compose-mail" class="btn btn-primary btn-block"> 
				<strong>Compose</strong> 
			</a>
					
			<h6> Folder <a href="javascript:void(0);" rel="tooltip" title="" data-placement="right" data-original-title="Refresh" class="pull-right txt-color-darken"><i class="fa fa-refresh"></i></a></h6>
					
			<ul class="inbox-menu-lg">
				<li class="active">
					<a class="inbox-load" href="javascript:void(0);"> Inbox </a>
				</li>
				<li>
					<a href="javascript:void(0);">Sent</a>
				</li>
				<li>
					<a href="javascript:void(0);">Draft</a>
				</li>
				<li>
					<a href="javascript:void(0);">Trash</a>
				</li>
			</ul>
		</div>
				
		<div class="table-wrap custom-scroll animated fast fadeInRight">
			<!-- ajax will fill this area -->
			LOADING...
		</div>
				
		<div class="inbox-footer">
			<div class="row">
				<div class="col-xs-6 col-sm-1">
					<div class="txt-color-white hidden-desktop visible-mobile">
						<div class="progress progress-micro">
							<div class="progress-bar progress-primary" style="width: 34%;">

							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-11 text-right">
					<div class="txt-color-white inline-block">

					</div>
				</div>
			</div>
		</div>			
	</div>
</div>
@stop

@section('additional_scripts')

<script src="js/plugin/delete-table-row/delete-table-row.min.js"></script>
<script src="js/plugin/summernote/summernote.min.js"></script>
<script src="js/plugin/select2/select2.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		pageSetUp();
		tableHeightSize()

		$(window).resize(function() {
			tableHeightSize()
		})

		function tableHeightSize() {
			if ($('body').hasClass('menu-on-top')) {
				var menuHeight = 68;

				var tableHeight = ($(window).height() - 224) - menuHeight;
				if (tableHeight < (320 - menuHeight)) {
					$('.table-wrap').css('height', (320 - menuHeight) + 'px');
				} else {
					$('.table-wrap').css('height', tableHeight + 'px');
				}

			} 
			else {
				var tableHeight = $(window).height() - 224;
				if (tableHeight < 320) {
					$('.table-wrap').css('height', 320 + 'px');
				} else {
					$('.table-wrap').css('height', tableHeight + 'px');
				}
			}
		}

		loadInbox();
		// loadComposeMail();
		function loadInbox() {
			 	loadURL("/adminInboxList", $('#inbox-content > .table-wrap'))
		}

		function loadComposeMail() {
				loadURL("/admincompose", $('#inbox-content > .table-wrap'))
		}

		$(".inbox-load").click(function() {
			loadInbox();
		});

		$("#compose-mail").click(function() {
			loadComposeMail();
		});
		
	});	
</script>

<!-- Your GOOGLE ANALYTICS CODE Below -->
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script');
		ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	})();

</script>
@stop
