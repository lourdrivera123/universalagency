<h2 class="email-open-header">
	Re: Timelogs of last client <span class="label txt-color-white">inbox</span>
	<a href="javascript:void(0);" rel="tooltip" data-placement="left" data-original-title="Print" class="txt-color-darken pull-right"></a>	
</h2>

<div class="inbox-info-bar">
	<div class="row">
		<div class="col-sm-9">
			<img src="img/avatars/5.png" alt="me" class="away">
			<strong>Sadi Orlaf</strong>
			<span class="hidden-mobile">&lt;sadi.orlaf@smartadmin.com&gt;to <strong>me</strong> on <i>12:10AM, 12 March 2013</i></span> 
		</div>
		<div class="col-sm-3 text-right">
			
			<div class="btn-group text-left">
				<button class="btn btn-primary btn-sm replythis">
					<i class="fa fa-reply"></i> Reply
				</button>
				<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu pull-right">
					<li>
						<a href="javascript:void(0);" class="replythis"><i class="fa fa-reply"></i> Reply</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="replythis"><i class="fa fa-mail-forward"></i> Forward</a>
					</li>
					<li>
						<a href="javascript:void(0);">
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:void(0);"><i class="fa fa-ban"></i> Mark as spam!</a>
					</li>
					<li>
						<a href="javascript:void(0);"><i class="fa fa-trash-o"></i> Delete forever</a>
					</li>
				</ul>
			</div>

		</div>
	</div>
</div>

<div class="inbox-message">
	<p>
	{{ $resume->firstname.' '.$resume->last_name }} has taken all the tests. You can now review the results:

	<a href="{{ URL::to('iqtestresult/'.$iqresult->hash) }}" class="btn btn-success" target="blank">IQ Result</a>
	<br/>
	<a href="{{ URL::to('personalityresult/'.$personalityresult->hash) }}" class="btn btn-success" target="blank">Personality Result</a>
	</p>	
	
	<p>
		The applicant is waiting for your reply.
	</p>
	
	<br>
	<br>
	Thanks,<br> 

</div>

<script type="text/javascript">
	
	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	//pageSetUp();
	
	// PAGE RELATED SCRIPTS
	
	$(".table-wrap [rel=tooltip]").tooltip();

	$(".replythis").click(function(){
		loadURL("/adminreply", $('#inbox-content > .table-wrap'));
	})
	
</script>
