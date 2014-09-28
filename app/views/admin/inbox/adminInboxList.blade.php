<table id="inbox-table" class="table table-striped table-hover">
	<tbody>
		@if(count($faq) > 0)
			@foreach($faq as $faq)
			<tr class="unread">
				<td class="inbox-table-icon">
					<div class="checkbox">
						<label>
							<input type="checkbox" class="checkbox style-2">
							<span></span> </label>
					</div>
				</td>
				<td class="inbox-data-from hidden-xs hidden-sm"> <b style="color:black">{{ $faq->user_name }} </b> </td>
				<td class="inbox-data-message"> <b style="color:black"> {{ $faq->subject }} </b> - {{ $faq->question }} </td>
				<td> <b>{{ $faq->created_at }}</b></td>
			</tr>
			@endforeach
			@elseif(count($iq) > 0 && count($personality) > 0)
			
			<?php $tests = getTestResults($iq, $personality) ?>
			
			@foreach( $tests as $test )
				<tr class="unread" data-iqid="{{ $test->iqid }}" data-personalityid="{{ $test->personalityid }}" data-userid="{{ $test->userid }}">
					<td class="inbox-table-icon">
						<div class="checkbox">
							<label>
							<input type="checkbox" class="checkbox style-2">
							<span></span> </label>
						</div>
					</td>

					<td class="inbox-data-from hidden-xs hidden-sm">
						<b>{{ Resume::where('user_id', '=', $test->userid)->first()->first_name }}</b>
					</td>

					<td class="inbox-data-message">
						<b>
							{{ Resume::where('user_id', '=', $test->userid)->first()->last_name }} ,
							{{ Resume::where('user_id', '=', $test->userid)->first()->first_name }}
						</b>
							finished taking the test/s. View results
					</td>
					<td>
						{{ $test->personality_created_at }}
					</td>
				</tr>
			@endforeach
			@endif
	</tbody>
</table>

<script type="text/javascript">
//Gets tooltips activated
	$("#inbox-table [rel=tooltip]").tooltip();

	$("#inbox-table input[type='checkbox']").change(function() {
		$(this).closest('tr').toggleClass("highlight", this.checked);
	});

	$("#inbox-table .inbox-data-message").click(function() {
		// getMail($this);
		
			var iqid = $(this).closest('tr').attr('data-iqid');
		var personalityid = $(this).closest('tr').attr('data-personalityid');
		var userid = $(this).closest('tr').attr('data-userid');	
		
		console.log(userid);
		console.log(iqid);
		console.log(personalityid);
		// LOAD AJAX PAGES
        $.ajax({
            type: "GET",
            url: '/adminopened',
            dataType: 'html',
            data: {
            	iqid: iqid,
            	personalityid: personalityid,
            	userid: userid
            },
            cache: true,
            beforeSend: function(){
              $('#inbox-content > .table-wrap').html('<h1><i class="fa fa-cog fa-spin"></i> Loading...</h1>').fadeIn('fast');
            },
            success: function (data) {
                $('#inbox-content > .table-wrap').html(data).fadeIn('slow');
                drawBreadCrumb();
                // console.log("ajax request successful")
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('#inbox-content > .table-wrap').html('<h4 style="margin-top:10px; display:block; text-align:left"><i class="fa fa-warning txt-color-orangeDark"></i> Error 404! Page not found.</h4>');
                //container.hide().html('<h1><i class="fa fa-cog fa-spin"></i> Loading...</h1>').load("ajax/error404.html").fadeIn('slow');
 
                drawBreadCrumb()
            },
            async: false
        });
        console.log("ajax request sent");

	})
	
	function getMail(obj) {
		// var pendingrequestid = $(this).closest('tr').attr('data-pendingrequestid');
		
		// var iqid = $(this).closest('tr').attr('data-iqid');
		// var personalityid = $(this).closest('tr').attr('data-personalityid');
		// var userid = $(this).closest('tr').attr('data-userid');	
		
		// console.log(userid);
		// console.log(iqid);
		// console.log(personalityid);
		// // LOAD AJAX PAGES
  //       $.ajax({
  //           type: "GET",
  //           url: '/adminopened',
  //           dataType: 'html',
  //           data: {
  //           	iqid: iqid,
  //           	personalityid: personalityid,
  //           	userid: userid
  //           },
  //           cache: true,
  //           beforeSend: function(){
  //             $('#inbox-content > .table-wrap').html('<h1><i class="fa fa-cog fa-spin"></i> Loading...</h1>').fadeIn('fast');
  //           },
  //           success: function (data) {
  //               $('#inbox-content > .table-wrap').html(data).fadeIn('slow');
  //               drawBreadCrumb();
  //               // console.log("ajax request successful")
  //           },
  //           error: function (xhr, ajaxOptions, thrownError) {
  //               $('#inbox-content > .table-wrap').html('<h4 style="margin-top:10px; display:block; text-align:left"><i class="fa fa-warning txt-color-orangeDark"></i> Error 404! Page not found.</h4>');
  //               //container.hide().html('<h1><i class="fa fa-cog fa-spin"></i> Loading...</h1>').load("ajax/error404.html").fadeIn('slow');
 
  //               drawBreadCrumb()
  //           },
  //           async: false
  //       });
  //       console.log("ajax request sent");
   	}

	$('.inbox-table-icon input:checkbox').click(function() {
		enableDeleteButton();
	})

	$(".deletebutton").click(function() {
		$('#inbox-table td input:checkbox:checked').parents("tr").rowslide();
	});

	function enableDeleteButton() {
		var isChecked = $('.inbox-table-icon input:checkbox').is(':checked');

		if (isChecked) {
			$(".inbox-checkbox-triggered").addClass('visible');
			//$("#compose-mail").hide();
		} else {
			$(".inbox-checkbox-triggered").removeClass('visible');
			//$("#compose-mail").show();
		}
	}
</script>