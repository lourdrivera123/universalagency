<h2 class="email-open-header">
	Compose New Message
</h2>

<!-- <form enctype="multipart/form-data" method="POST" class="form-horizontal" id="email_compose_form"> -->

{{ Form::open(['enctype' => 'multipart/form-data', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'email_compose_form']) }}

<div class="inbox-info-bar no-padding">
	<div class="row">
		<div class="form-group">
			<label class="control-label col-md-1"><strong>To</strong></label>
			<div class="col-md-11">
				<select multiple style="width:100%" class="select2" data-select-search="true" name="recipient" >
					@if(count($emails) > 0)
					@foreach( $emails as $email )
					<option value="{{ $email->email }}">{{ $email->email }}</option>
					@endforeach
					@endif
				</select>
			</div>
		</div>
	</div>	
</div>
<div class="inbox-info-bar no-padding">
	<div class="row">
		<div class="form-group">
			<label class="control-label col-md-1"><strong>Subject</strong></label>
			<div class="col-md-11">
				<input class="form-control" name="subject" placeholder="Email Subject" type="text">
			</div>
		</div>
	</div>	
</div>

<div class="inbox-message no-padding">

	<div id="emailbody">

		<br><br><br><br><br>Thanks,<br><strong>Admin</strong><br><br><small>CEO - Universal Agency <br> V. Co. Building, D. Suazo Street, Davao City, Davao Del Sur <br><i class="fa fa-phone"> (082) 221 6722 </i></small><br><img src="../../images/main_logo.png" height="20" width="auto" style="margin-top:7px; padding-right:9px; border-right:1px dotted #9B9B9B;" />		
	</div>	
</div>

<div class="inbox-compose-footer">

	<button class="btn btn-danger" type="button">
		Disregard
	</button>

	<button class="btn btn-info" type="button">
		Draft
	</button>

	<button  data-loading-text="&lt;i class='fa fa-refresh fa-spin'&gt;&lt;/i&gt; &nbsp; Sending..." class="btn btn-primary pull-right" type="submit" id="btn_submit_message">
		Send <i class="fa fa-arrow-circle-right fa-lg"></i>
	</button>


</div>

<!-- </form> -->

{{ Form::close() }}


<script type="text/javascript">
	
	// DO NOT REMOVE : GLOBAL FUNCTIONS!

	runAllForms();

	 // PAGE RELATED SCRIPTS

	 $(".table-wrap [rel=tooltip]").tooltip();



	 $('#emailbody').summernote({
	 	height: 250,
	 	focus: false,
	 	tabsize: 2
	 });


	 $(".show-next").click(function () {
	 	$this = $(this);
	 	$this.hide();
	 	$this.parent().parent().parent().parent().parent().next().removeClass("hidden");
	 })

	 $("#email_compose_form").validate({

	 	submitHandler: function(form) {
	 		var formData = new FormData($('#email_compose_form')[0]);
	 		var token = $('#email_compose_form > input[name="_token"]').val();
	 		var message = $('#emailbody').code();
	 		formData.append('_token', token);
	 		formData.append('message', message);

	 		$.ajax({
          url: '/sendMessageFromAdmin',  //Server script to process data
          type: 'POST',

          xhr: function() {  // Custom XMLHttpRequest
          	var myXhr = $.ajaxSettings.xhr();
                          if(myXhr.upload){ // Check if upload property exists
                              myXhr.upload.addEventListener('progress',progressHandler, false); // For handling the progress of the upload
                          }
                          return myXhr;
                      },
                      success: completeHandler,

          // Form data
          data: formData,
          
          //Options to tell jQuery not to process data or worry about content-type.
          cache: false,
          contentType: false,
          processData: false,// what type of data do we expect back from the server
          encode	: true
      });

	 		function progressHandler(e){
	 			if(e.lengthComputable){
	 				
	 			}
	 		}

	 		function completeHandler(data)
	 		{
	 			$.smallBox({
	 				title : 'Message Sent !',
	 				content : "<i class='fa fa-clock-o'></i> <i>just now...</i>",
	 				color : "#296191",
	 				iconSmall : "fa fa-thumbs-up bounce animated",
	 				timeout : 5000
	 			});

	 			window.location = '../../admininbox';
	 		}
	 	},

	// Rules for form validation
	rules : {
		recipient : {
			required : true
		},
		subject : {
			required : true
		}
	},

				// Messages for form validation
				messages : {
					recipient : {
						required : '<span style="color:red">Message must have atleast 1 recipient</span>'
					},
					subject : {
						required : '<span style="color:red">Please Include a Subject for this message</span>'
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}

		// alert($('#char').val());

		// alert('fuck');
	    // var $btn = $(this);
	    // $btn.button('loading');

	    // wait for animation to finish and execute send script
	  //   setTimeout(function () {
	  //       //Insert send script here


	  //       // Load inbox once send is complete

			// loadURL("ajax/email/email-list.html", $('#inbox-content > .table-wrap'))


	  //   }, 1000); // how long do you want the delay to be? 
});

// $('#email-compose-form').submit(function(){
// 	console.log('fuck');
// 	return false;
// });


	// $('#btn_submit').click(function(){
	// 	alert($('#char').val());
		// alert($('#emailbody').html());
	// });

</script>
