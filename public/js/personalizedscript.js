// Add Job History
$('#btn_add_job_history').click(function(){
	var resume_id = $('#resume_id').val();
	var company_name = $('#company_name').val();
	var title = $('#title').val();
	var month_from = $('[name="month_from"]').val();
	var year_from = $('[name="year_from"]').val();
	var month_to = $('[name="month_to"]').val();
	var year_to = $('[name="year_to"]').val();
	
	var description = $('#description').val();
	var token = $('#create_resume > input[name="_token"]').val();

	if( company_name == '')
	{
		$('#companynameerror').css('display', '');

		$('html, body').animate({
			scrollTop: $('#add_job_history_accordion').offset().top }, 200);		

		$('#companynameerror').delay(2500).fadeOut(300, function(){
			$(this).css('display', 'none');
		});

		return false;
	}

	if( title == '' )
	{
		$('#titleerror').css('display', '');

		$('html, body').animate({
			scrollTop: $('#add_job_history_accordion').offset().top }, 200);

		$('#titleerror').delay(2500).fadeOut(300, function(){
			$(this).css('display', 'none');
		});		

		return false;
	}

	if(validateTimePeriodJobHistory())
	{

		$.ajax(
		{
			url: "/addJobHistory",       
			type: "post",
			data: { _token: token, resume_id: resume_id,
				company_name: company_name, title: title, 
				month_from: month_from, year_from: year_from,
				month_to: month_to, year_to: year_to,
				description: description 
			},
		})
		.done(function(data)
		{
			$('html, body').animate({
				scrollTop: $('#add_job_history_accordion').offset().top }, 200);

			$('#jobhistory_list').prepend('<div class="animated bounceInLeft"><div class="list-group"><div class="list-group-item"><strong><h4 class="list-group-item-heading">'+data.company_name+'</h4></strong><h6 class="list-group-item-text">'+data.jobtitle+'</h6><h6 class="list-group-item-text">'+ data.fromdate +' - '+data.todate+'</h6><br><p class="list-group-item-text">'+data.desc+'</p><br><p><button type="button" class="btn btn-sm btn-red" onClick="deleteJobhistory($(this))" data-id="'+data.jobhistoryid+'">delete</button></p></div></div></div>');

			$('html, body').animate({
				scrollTop: $('#scrollarea').offset().top }, 1000);

			var company_name = $('#company_name').val('');
			var title = $('#title').val('');
			var month_from = $('[name="month_from"]').val('');
			var year_from = $('[name="year_from"]').val('');
			var month_to = $('[name="month_to"]').val('');
			var year_to = $('[name="year_to"]').val('');
			var description = $('#description').val('');

			$('#triggerable').trigger('click');
		});

}

return false;

});
//End of Code

//Delete Jobhistory
function deleteJobhistory(obj)
{
	$('html, body').animate({
		scrollTop: obj.offset().top }, 200);

	obj.parent().parent().parent().removeClass().addClass('bounceOutRight' + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$(this).removeClass();
		$(this).remove();
	});

	$('html, body').animate({
		scrollTop: $('#scrollarea').offset().top }, 1000);

	var token = $('#create_resume > input[name="_token"]').val();
	var id = obj.data('id');

	$.post( "/deleteJobhistory", { _token: token, id: id }, function( data ) {
		console.log(data);
	});
}
//End of Code

// Add Education
$('#btn_add_education').click(function(){
	var resume_id = $('#resume_id').val();
	var school_name = $('#school_name').val();
	var degree_level = $('[name="degree_level"]').val();
	var field_of_study = $('#field_of_study').val();

	var year_from_education = $('[name="year_from_education"]').val();
	var year_to_education = $('[name="year_to_education"]').val();
	
	var additional_notes = $('#additional_notes').val();
	var token = $('#create_resume > input[name="_token"]').val();

	if( school_name == ''){
		$('#schoolnameerror').css('display', '');

		$('html, body').animate({
			scrollTop: $('#add_education_accordion').offset().top }, 200);

		$('#schoolnameerror').delay(2500).fadeOut(300, function(){
			$(this).css('display', 'none');
		});		

		return false;
	}

	if( field_of_study == '' && degree_level != 1 )
	{
		$('#fieldofstudyerror').css('display', '');

		$('html, body').animate({
			scrollTop: $('#add_education_accordion').offset().top }, 200);

		$('#fieldofstudyerror').delay(2500).fadeOut(300, function(){
			$(this).css('display', 'none');
		});		

		return false;
	}

	if(validateTimPeriodEducation())
	{
		$.ajax(
		{
			url: "/addEducation",       
			type: "post",
			data: { _token: token, resume_id: resume_id,
				school_name: school_name, degree_level: degree_level, 
				field_of_study: field_of_study, year_to_education: year_to_education,
				year_from_education: year_from_education, additional_notes: additional_notes
			},
		})
		.done(function(data)
		{
			$('html, body').animate({
				scrollTop: $('#add_education_accordion').offset().top }, 200);

			$('#education_list').prepend('<div class="animated bounceInLeft"><div class="list-group"><div class="list-group-item"><h4 class="list-group-item-heading">'+data.company_name+' ( ' + data.year_from + ' - ' + data.year_to + ' ) ' + '</h4><h6 class="list-group-item-text">'+data.level + ' ' + ((data.field_of_study != "") ? '- '+data.field_of_study : "")+'</h6><br/><p class="list-group-item-text">'+data.desc+'</p><br/><p><button type="button" class="btn btn-sm btn-red" data-id="'+data.id+'" onClick="deleteEducation($(this))">delete</button></p></div></div></div>');

			$('html, body').animate({
				scrollTop: $('#scrollarea2').offset().top }, 1000);

			
			var school_name = $('#school_name').val('');
			var degree_level = $('#degree_level').val('');
			var field_of_study = $('#field_of_study').val('');

			var year_from = $('[name="year_from"]').val('');
			var year_to = $('[name="year_to"]').val('');

			var additional_notes = $('#additional_notes').val('');

			$('#sotriggerable').trigger('click');
		});
}

return false;

});
//End of Code

//Delete Education
function deleteEducation(obj)
{
	$('html, body').animate({
		scrollTop: obj.offset().top }, 200);

	obj.parent().parent().parent().removeClass().addClass('bounceOutRight' + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$(this).removeClass();
		$(this).remove();
	});

	$('html, body').animate({
		scrollTop: $('#scrollarea2').offset().top }, 1000);

	var token = $('#create_resume > input[name="_token"]').val();
	var id = obj.data('id');

	$.post( "/deleteEducation", { _token: token, id: id }, function( data ) {
		console.log(data);
	});
}
//End of Code

//Display photo on change
$('#icon_to_trigger').click(function(){
	$('#photo, #uploadrequirement').trigger('click');
});

$('#icon_to_trigger_editphoto').click(function(){
	$('#editphoto').trigger('click');
});

$(function(){
	$("#photo, #editphoto").change(showPreview);
});

function showPreview(e) {
	var $input = $(this);
	var name = $(this).attr("name");

	console.log(name);
	var inputFiles = this.files;

	if(inputFiles == undefined || inputFiles.length == 0) return;
	var inputFile = inputFiles[0];

	var reader = new FileReader();

	reader.onload = function(event) {
		$("#img-render-"+name).attr("src", event.target.result);
	};
	reader.onerror = function(event) {
		alert("I AM ERROR: " + event.target.error.code);
	};

	reader.readAsDataURL(inputFile);
}
//End of Code

//Edit Job Category
function editjobcategory(obj)
{
	var $row = obj.closest("tr"),        // Finds the closest row <tr> 
	$id = $row.find("td:nth-child(1)");
    $name = $row.find("td:nth-child(2)"); // Finds the 2nd <td> element
    $desc = $row.find("td:nth-child(3)");
    
    $('[name="jobcategory_id"]').val($id.text());
    $('#category_name').val($name.text());
    $('#description').val($desc.text());
}
//End of Code

//Update Job Category with validation
$('#editcategoryform').validate({
	submitHandler: function(form) {
		var formData = new FormData($('#editcategoryform')[0]);
		var token = $('#editcategoryform > input[name="_token"]').val();
		formData.append('_token', token);

		$.ajax({
          url: '/adminupdatecategory',  //Server script to process data
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
				$('#editjobcategorysubmit').addClass("disabled");
				$('#editjobcategorysubmit').html('<i class="fa fa-gear fa-spin"></i>');
				$('#editjobcategoryfooter').prepend('<div class="alert alert-success" role="alert">Please be Patient, were\'s Saving the Job Category</div>');
			}
		}

		function completeHandler(data)
		{
			$('#editcategoryform #category_name').val('');
			$('#editcategoryform #description').val('');
			$('#jobcategoryupdated').text(data.category_name + " category was updated");
			$('#'+data.id).find("td:nth-child(2)").text(data.category_name);
			$('#'+data.id).find("td:nth-child(3)").text(data.desc);
			$('#jobcategoryupdated').css('display', '');
			$('#editjobcategorysubmit').removeClass("disabled");
			$('#editjobcategorysubmit').html('Save');
			$('#editjobcategoryfooter').children('div').remove();
			$('#editjobcategorymodal').modal('hide');
			$('#jobcategoryupdated').fadeOut(2000);
		}
	},

// Rules for form validation
rules : {
	category_name : {
		required : true,
		remote: {
			url: '/checkUniqueJobcategory',
			type: 'get',
			data: {
				category_name: function()
				{
					return $('#editcategoryform :input[name="category_name"]').val();
				},
				jobcategory_id: function()
				{
					return $('#editcategoryform :input[name="jobcategory_id"]').val();
				}
			}
		}
	},
	description : {
		required : true
	}
},

				// Messages for form validation
				messages : {
					category_name : {
						required : 'Please Fill up the Job Category Name',
						remote: 'Job Category already exist'
					},
					description : {
						required : 'Please Provide Description',
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
//End of Code

//Add Job Category with Valdation
$('#addjobcategoryform').validate({
	submitHandler: function(form) {
		var formData = new FormData($('#addjobcategoryform')[0]);
		var token = $('#addjobcategoryform > input[name="_token"]').val();
		formData.append('_token', token);

		$.ajax({
          url: '/adminaddjobcategory',  //Server script to process data
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
				$('#addjobcategorysubmit').addClass("disabled");
				$('#addjobcategorysubmit').html('<i class="fa fa-gear fa-spin"></i>');
				$('#addjobcategoryfooter').prepend('<div class="alert alert-success" role="alert">Please be Patient, were\'s Saving the Job Category</div>');
			}
		}

		function completeHandler(data)
		{
			$('#addjobcategoryform #category_name').val('');
			$('#addjobcategoryform #description').val('');
			$('#jobcategoriestable').append('<tr id="'+data.id+'"><td>'+data.id+'</td><td>'+data.category+'</td><td>'+data.desc+'</td><td><a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editjobcategorymodal" onclick="editjobcategory($(this))"><i class="fa fa-edit"></i></a></td><td><a href="#" class="btn btn-danger btn-circle" onclick="disablejobcategory($(this))"><i class="fa fa-times"></i></a></td></tr>');
			$('#jobupdates').text("New Job has been added");
			$('#jobupdates').css('display', '');
			$('#addjobcategorysubmit').removeClass("disabled");
			$('#addjobcategorysubmit').html('Save');
			$('#addjobcategoryfooter').children('div').remove();
			$('#addjobcategorymodal').modal('hide');
			$('#jobcategoryupdated').fadeOut(2000);
		}
	},

// Rules for form validation
rules : {
	category_name : {
		required : true,
		remote: '/checkUniqueJobcategory'
	},
	description : {
		required : true
	}
},

				// Messages for form validation
				messages : {
					category_name : {
						required : 'Please Fill up the Job Category Name',
						remote: 'Job Category already exist'
					},
					description : {
						required : 'Please Provide Description',
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}

			});
//End of Code

//Disable Job Category
function disablejobcategory(obj)
{
	var token = $('#editcategoryform > input[name="_token"]').val();
	var id = obj.closest("tr").find("td:nth-child(1)").text();
	$.post('/admindisablejobcategory', {_token: token, id: id}, function(data){
		obj.removeClass('btn-danger').addClass('btn-success');
		obj.children('i').removeClass('fa-times').addClass('fa-check');
		obj.attr('onclick', 'enablejobcategory($(this))');
		$('#jobcategoryupdated').text(data.category_name + " category was updated");
		$('#jobcategoryupdated').css('display', '');
		$('#jobcategoryupdated').fadeOut(2000);
	});
}
//End of Code

//Enable Job Category
function enablejobcategory(obj)
{
	var token = $('#editcategoryform > input[name="_token"]').val();
	var id = obj.closest("tr").find("td:nth-child(1)").text();
	$.post('/adminenablejobcategory', {_token: token, id: id}, function(data){
		obj.removeClass('btn-success').addClass('btn-danger');
		obj.children('i').removeClass('fa-check').addClass('fa-times');
		obj.attr('onclick', 'disablejobcategory($(this))');
		$('#jobcategoryupdated').text(data.category_name + " category was updated");
		$('#jobcategoryupdated').css('display', '');
		$('#jobcategoryupdated').fadeOut(2000);
	});
}
//End of Code

//Apply
function apply(obj)
{
	// var status = checkIfTakenTest();

	// console.log(status);
	// if (status != 'all tests taken!')
	// {
	// 	$('#alertModal').modal('show');
	// 	return false;
	// }
	
	var _token = $('#applyjobform > input[name="_token"]').val();
	var jobid = obj.data('jobid');
	var applicantid = obj.data('applicantid');

	$.post('/apply', { jobid: jobid, applicantid: applicantid, _token: _token }, function(data){
		console.log(data.status);

		obj.attr('id', data.id);
		obj.removeClass('btn-primary').addClass('btn-red disabled');
		obj.text('Request Sent');
		// obj.attr('onclick', 'cancelapply($(this))');
	});
}
//End of Code

//Cancel Request
// function cancelapply(obj)
// {
// 	var _token = $('#applyjobform > input[name="_token"]').val();
// 	var jobrequestid = obj.attr('id');

// 	$.post('/cancelapply', { jobrequestid: jobrequestid, _token: _token }, function(data){
// 		console.log(data.status);
// 		obj.removeClass('btn-red').addClass('btn-primary');
// 		obj.text('I AM INTERESTED ON THIS JOB');
// 		obj.attr('onclick', 'apply($(this))');
// 	});
// }
//End of Code

//Add Employer
$('#addemployerform').validate({

	submitHandler: function(form) {
		var formData = new FormData($('#addemployerform')[0]);
		var token = $('#addemployerform > input[name="_token"]').val();
		formData.append('_token', token);

		$.ajax({
          url: '/adminaddemployer',  //Server script to process data
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
				$('#addemployersubmit').addClass("disabled");
				$('#addemployersubmit').html('<i class="fa fa-gear fa-spin"></i>');
				$('#addemployerfooter').prepend('<div class="alert alert-success" role="alert">Please be Patient, we are saving Employer Information</div>');
			}
		}

		function completeHandler(data)
		{
			$('#employerstable').append('<tr id="'+data.id+'"><td>'+data.id+'</td><td><img src="'+data.photo+'" class="img-circle" style="height:50px;width:50px;"></td><td><a href="employer/'+data.id+'")>'+data.businessname+'</a></td><td>'+data.businesstype+'</td><td>'+data.deschasdas+'</td><td>'+data.email+'</td><td>'+data.phone_number+'</td><td>'+data.address+'</td><td><a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editemployermodal" onclick="editemployer($(this))"><i class="fa fa-edit"></i></a></td><td><a href="#" class="btn btn-danger btn-circle" onclick="disableemployer($(this))"><i class="fa fa-times"></i></a></td></tr>');
			// $('#employerupdates').text("New Category has been added");
			// $('#employerupdates').css('display', '');
			$('#addemployersubmit').removeClass("disabled");
			$('#addemployersubmit').html('Save');
			$('#addemployerfooter').children('div').remove();
			// $('#addemployerform').val('');
			$('#addemployermodal').modal('hide');
			// $('#employerupdates').fadeOut(2000);

			$('#addemployerform')[0].reset();

			$.smallBox({
				title : data.businessname+' added',
				content : "<i class='fa fa-clock-o'></i> <i>just now...</i>",
				color : "#296191",
				iconSmall : "fa fa-thumbs-up bounce animated",
				timeout : 5000
			});

		}
	},
	
	// Rules for form validation
	rules : {
		email : {
			required : true,
			email: true,
			remote: '/checkUniqueEmail'
		},
		businessname : {
			required : true,
			remote: '/checkBusinessName'
		},
		businesstype : {
			required : true
		},
		phone_number : {
			required: true,
			number: true,
			remote: '/checkEmployerPhoneNumber'
		},
		address : {
			required: true
		},
		description : {
			required: true
		}
	},

				// Messages for form validation
				messages : {
					email : {
						required : 'Please Fill up the Employer\'s Email',
						email: 'Please Input a Valid Email',
						remote: 'Email already exist'
					},
					businessname : {
						required : 'Please Fill up the Business Name',
						remote: 'Business Name Already Exist'
					},
					businesstype : {
						required : 'Please Fill up the Business Type',
					},
					phone_number : {
						required: 'Please Fill up the Phone Number',
						number: 'Please enter a valid phone number',
						remote: 'Phone Number Already Exist'
					},
					address : {
						required: 'Please Fill up Address'
					},
					description : {
						required: 'Please Fill up Description'
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
//End of Code

//Edit Employer
function editemployer(obj)
{
	var $row = obj.closest("tr"),        // Finds the closest row <tr> 
	$id = $row.find("td:nth-child(1)");
	$photo = $row.find("td:nth-child(2)").children('img');
    $businessname = $row.find("td:nth-child(3)"); // Finds the 2nd <td> element
    $businesstype = $row.find("td:nth-child(4)");
    $desc = $row.find("td:nth-child(5)");
    $email = $row.find("td:nth-child(6)");
    $phone = $row.find("td:nth-child(7)");
    $address = $row.find("td:nth-child(8)");
    
    $('[name="employer_id"]').val($id.text());
    $('#editemployerform #img-render-editphoto').attr("src", $photo.attr("src"));
    $('#editemployerform #businessname').val($businessname.text());
    $('#editemployerform #description').val($desc.text());
    $('#editemployerform #email').val($email.text());
    $('#editemployerform #phone_number').val($phone.text());
    $('#editemployerform #address').val($address.text());
    $('#editemployerform #businesstype').val($businesstype.text());

    // console.log($('#editemployerform :input[name="employer_id"]').val());
}
//End of Code

//Update Employer with Validation
$('#editemployerform').validate({
	submitHandler: function(form) {
		var formData = new FormData($('#editemployerform')[0]);
		var token = $('#editemployerform > input[name="_token"]').val();
		formData.append('_token', token);

		$.ajax({
          url: '/adminupdateemployer',  //Server script to process data
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
				$('#editemployersubmit').addClass("disabled");
				$('#editemployersubmit').html('<i class="fa fa-gear fa-spin"></i>');
				$('#editemployerfooter').prepend('<div class="alert alert-success" role="alert">Please be Patient, we are saving Employer Information</div>');
			}
		}

		function completeHandler(data)
		{
			$('#'+data.id).find("td:nth-child(2)").children('img').attr("src", data.photo);
			$('#'+data.id).find("td:nth-child(3)").text(data.businessname);
			$('#'+data.id).find("td:nth-child(4)").text(data.businesstype);
			$('#'+data.id).find("td:nth-child(5)").text(data.deschasdas);
			$('#'+data.id).find("td:nth-child(6)").text(data.email);
			$('#'+data.id).find("td:nth-child(7)").text(data.phone_number);
			$('#'+data.id).find("td:nth-child(8)").text(data.address);

			$('#employerupdates').css('display', '');
			$('#editemployersubmit').removeClass("disabled");
			$('#editemployersubmit').html('Save');
			$('#editemployerfooter').children('div').remove();
			
			$('#employerupdates').text(data.businessname + " was updated");
			$('#employerupdates').css('display', '');
			$('#editemployermodal').modal('hide');
			$('#employerupdates').fadeOut(2000);
		}
	},

// Rules for form validation
rules : {
	email : {
		required : true,
		email: true,
		remote: {
			url: '/checkUniqueEmail',
			type: "get",
			data:
			{
				employer_id: function()
				{
					return $('#editemployerform :input[name="employer_id"]').val();
				},
				email: function()
				{
					return $('#editemployerform :input[name="email"]').val();
				}
			}
		}
	},
	businessname : {
		required : true,
		remote: {
			url: '/checkBusinessName',
			type: "get",
			data:
			{
				employer_id: function()
				{
					return $('#editemployerform :input[name="employer_id"]').val();
				},
				businessname: function()
				{
					return $('#editemployerform :input[name="businessname"]').val();
				}
			}
		}
			// remote: '/checkBusinessName'
		},
		businesstype : {
			required : true
		},
		phone_number : {
			required: true,
			number: true,
			remote: {
				url: '/checkEmployerPhoneNumber',
				type: "get",
				data:
				{
					employer_id: function()
					{
						return $('#editemployerform :input[name="employer_id"]').val();
					},
					phone_number: function()
					{
						return $('#editemployerform :input[name="phone_number"]').val();
					}
				}
			}
			// remote: '/checkEmployerPhoneNumber'
		},
		address : {
			required: true
		},
		description : {
			required: true
		}
	},

				// Messages for form validation
				messages : {
					email : {
						required : 'Please Fill up the Employer\'s Email',
						email: 'Please Input a Valid Email',
						remote: 'Email already exist'
					},
					businessname : {
						required : 'Please Fill up the Business Name',
						remote: 'Business Name Already Exist'
					},
					phone_number : {
						required: 'Please Fill up the Phone Number',
						number: 'Please enter a valid phone number',
						remote: 'Phone Number Already Exist'
					},
					address : {
						required: 'Please Fill up Address'
					},
					description : {
						required: 'Please Fill up Description'
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}

			});
//End of Code

//Disable Employer
function disableemployer(obj)
{
	var token = $('#editemployerform > input[name="_token"]').val();
	var id = obj.closest("tr").find("td:nth-child(1)").text();
	$.post('/admindisableemployer', {_token: token, id: id}, function(data){
		obj.removeClass('btn-danger').addClass('btn-success');
		obj.children('i').removeClass('fa-times').addClass('fa-check');
		obj.attr('onclick', 'enableemployer($(this))');
		$('#employerupdates').text(data.businessname + " deactivated");
		$('#employerupdates').css('display', '');
		$('#employerupdates').fadeOut(2000);
	});
}
//End of Code

//Enable Employer
function enableemployer(obj)
{
	var token = $('#editemployerform > input[name="_token"]').val();
	var id = obj.closest("tr").find("td:nth-child(1)").text();
	$.post('/adminenableemployer', {_token: token, id: id}, function(data){
		obj.removeClass('btn-success').addClass('btn-danger');
		obj.children('i').removeClass('fa-check').addClass('fa-times');
		obj.attr('onclick', 'disableemployer($(this))');
		$('#employerupdates').text(data.businessname + " was updated");
		$('#employerupdates').css('display', '');
		$('#employerupdates').fadeOut(2000);
	});
}
//End of Code

//Disable Applicant
function disableapplicant(obj)
{
	var token = $('#applicantform > input[name="_token"]').val();
	var id = obj.closest("tr").find("td:nth-child(1)").text();
	$.post('/admindisableapplicant', {_token: token, id: id}, function(data){
		obj.removeClass('btn-danger').addClass('btn-success');
		obj.children('i').removeClass('fa-times').addClass('fa-check');
		obj.attr('onclick', 'enableapplicant($(this))');
		$('#applicantupdates').text(data.applicantname + " deactivated");
		$('#applicantupdates').css('display', '');
		$('#applicantupdates').fadeOut(2000);
	});
}
//End of Code

//Enable Applicant
function enableapplicant(obj)
{
	var token = $('#applicantform > input[name="_token"]').val();
	var id = obj.closest("tr").find("td:nth-child(1)").text();
	$.post('/adminenableapplicant', {_token: token, id: id}, function(data){
		obj.removeClass('btn-success').addClass('btn-danger');
		obj.children('i').removeClass('fa-check').addClass('fa-times');
		obj.attr('onclick', 'disableapplicant($(this))');
		$('#applicantupdates').text(data.applicantname + " activated");
		$('#applicantupdates').css('display', '');
		$('#applicantupdates').fadeOut(2000);
	});
}
//End of Code

//Edit Job with Validation
function editjob(obj)
{
	var $row = obj.closest("tr"),        // Finds the closest row <tr> 
	$id = $row.find("td:nth-child(1)");
    $jobtitle = $row.find("td:nth-child(2)"); // Finds the 2nd <td> element
    $description = $row.find("td:nth-child(3)");
    $category = $row.find("td:nth-child(4)");
    $job_location = $row.find("td:nth-child(5)");
    $company = $row.find("td:nth-child(6)");
    $gender = $row.find("td:nth-child(7)");
    $agefrom = $row.find("td:nth-child(8)");
    $ageto = $row.find("td:nth-child(9)");
    $education = $row.find("td:nth-child(10)");
    $minimumyearsofexperience = $row.find("td:nth-child(11)");
    $others = $row.find("td:nth-child(13)");
    $invitationexpiration = $row.find("td:nth-child(14)");
    
    $('#editjobform [name="job_id"]').val($id.text());
    $('#editjobform #company').val($company.text());
    $('#editjobform #job_category').val($category.text());
    $('#editjobform #job_title').val($jobtitle.text());
    $('#editjobform #description').val($description.text());
    $('#editjobform #agefrom').val($agefrom.text());
    $('#editjobform #ageto').val($ageto.text());
    $('#editjobform #education').val($education.text());
    $('#editjobform [name="editjob_location"]').val($job_location.text());
    $('#editjobform #others').val($others.text());
    $('#editjobform #updateinvitationexpiration').val($invitationexpiration.text());
    $('#editjobform [name="gender"]').val($gender.text());

    if( $minimumyearsofexperience.text() == 0)
    {
    	$('[name="anyworkexperienceedit"]').prop('checked', true);
    	$('#editjobform #minimumyearsofexperience').prop("disabled", true);
    } else {
    	$('#editjobform #minimumyearsofexperience').val($minimumyearsofexperience.text());
    }

    if($gender.text() == 'male')
    {
    	$('#gendermale').prop('checked', true);
    } 
    else if($gender.text() == 'female')
    {
    	$('#genderfemale').prop('checked', true);
    }
    else{
    	$('#genderboth').prop('checked', true);
    }

}
//End of Code

//Disable Job
function disablejob(obj)
{
	var token = $('#editjobform > input[name="_token"]').val();
	var id = obj.closest("tr").find("td:nth-child(1)").text();
	$.post('/admindisablejob', {_token: token, id: id}, function(data){
		obj.removeClass('btn-danger').addClass('btn-success');
		obj.children('i').removeClass('fa-times').addClass('fa-check');
		obj.attr('onclick', 'enablejob($(this))');
		$('#jobupdates').text(data.jobname + " deactivated");
		$('#jobupdates').css('display', '');
		$('#jobupdates').fadeOut(2000);
	});
}
//End of Code

//Enable Job
function enablejob(obj)
{
	var token = $('#editjobform > input[name="_token"]').val();
	var id = obj.closest("tr").find("td:nth-child(1)").text();
	$.post('/adminenablejob', {_token: token, id: id}, function(data){
		obj.removeClass('btn-success').addClass('btn-danger');
		obj.children('i').removeClass('fa-check').addClass('fa-times');
		obj.attr('onclick', 'disablejob($(this))');
		$('#jobupdates').text(data.jobname + " activated");
		$('#jobupdates').css('display', '');
		$('#jobupdates').fadeOut(2000);
	});
}
//End of Code

//Update Job with Validation
$('#editjobform').validate({
	submitHandler: function(form) {
		var formData = new FormData($('#editjobform')[0]);
		var token = $('#editjobform > input[name="_token"]').val();
		formData.append('_token', token);

		$.ajax({
          url: '/adminupdatejob',  //Server script to process data
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
				$('#editjobsubmit').addClass("disabled");
				$('#editjobsubmit').html('<i class="fa fa-gear fa-spin"></i>');
				$('#editjobfooter').prepend('<div class="alert alert-success" role="alert">Please be Patient, we are updating the Job Information</div>');
			}
		}

		function completeHandler(data)
		{
			$('#'+data.id).find("td:nth-child(2)").html('<a href="job/'+data.id+'">'+data.job_title+"</a>");
			$('#'+data.id).find("td:nth-child(3)").text(data.desc);
			$('#'+data.id).find("td:nth-child(4)").text(data.category);
			$('#'+data.id).find("td:nth-child(5)").text(data.joblocation);
			$('#'+data.id).find("td:nth-child(6)").text(data.businessname);
			$('#'+data.id).find("td:nth-child(7)").text(data.gender);
			$('#'+data.id).find("td:nth-child(8)").text(data.agefrom);
			$('#'+data.id).find("td:nth-child(9)").text(data.ageto);
			$('#'+data.id).find("td:nth-child(10)").text(data.education);
			$('#'+data.id).find("td:nth-child(11)").text(data.minimumyearsofexperience);
			$('#'+data.id).find("td:nth-child(13)").text(data.others);
			$('#'+data.id).find("td:nth-child(14)").text(data.invitationexpiration);

			$('#jobupdates').text(data.businessname + " was updated");			
			$('#jobupdates').css('display', '');
			$('#editjobsubmit').removeClass("disabled");
			$('#editjobsubmit').html('Save');
			$('#editjobfooter').children('div').remove();
			$('#editjobmodal').modal('hide');
			$('#jobupdates').fadeOut(2000);
		}
	},

	// Rules for form validation
	rules : {
		company : {
			required : true
		},
		job_category : {
			required : true
		},
		job_title : {
			required : true,
			remote: {
				url: '/checkJobTitleforUpdate',
				type: "post",
				data:
				{
					_token: function()
					{
						return $('#editjobform :input[name="_token"]').val();
					},
					job_id: function()
					{
						return $('#editjobform :input[name="job_id"]').val();
					},
					job_title: function()
					{
						return $('#editjobform :input[name="job_title"]').val();
					}
				}
			}
		},
		description : {
			required : true
		},
		gender : {
			required: true
		},
		invitationexpiration: {
			required: true
		},
		agefrom: {
			required: true
		},
		ageto: {
			required: true
		},
		education: {
			required:true
		}
	},

				// Messages for form validation
				messages : {
					company : {
						required : 'Please Select a Company'
					},
					job_category : {
						required : 'Please Select a Job Category'
					},
					job_title : {
						required : 'Please include a Job Title',
						remote: 'This Job Title already exist'
					},
					description : {
						required : 'Please describe the Job'
					},
					gender : {
						required : 'Please choose a qualified gender'
					},
					invitationexpiration: {
						required: 'Please add a date until invitations are active'
					},
					agefrom : {
						required: 'Please select minimum age qualification'
					},
					ageto : {
						required: 'Please select maximum age qualification'
					},
					education: {
						required: 'Please select a least Education level'
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}

			});
//End of Code

//List Requesting Applicants
function listrequestingapplicants(obj)
{	
	$('#applicantstable').empty();
	var jobid = obj.closest("tr").attr('data-jobid');

	$.get('/listrequestingapplicants', { jobid: jobid }, function(data){
		// console.log(data.request_status);
		$.each( data, function( key, value ) {
			$('#applicantstable').append('<tr data-applicantid="'+value.user_id+'" data-jobid="'+value.job_id+'"><td><a href="applicant/'+value.resume_id+'" target="_blank">'+value.applicant_name+'</a></td><td>'+value.timeofrequest+'</td><td><button class="btn btn-success" onclick="approverequest($(this))">Approve</button></td><td><button class="btn btn-danger" onclick="disapproverequest($(this))">Disapprove</button></td></tr>');
		});
	});

}
//End of Code

//List Candidates
function listcandidates(obj)
{
	$('#candidatestable').empty();
	var jobid = obj.closest("tr").attr('data-jobid');
	// var job_id = $id.text();
	
	$.get('/adminlistcandidates', { jobid: jobid }, function(data){
		console.log(data.status);
		$.each( data, function( key, value ) {
			$('#candidatestable').append('<tr data-applicantid="'+value.user_id+'" data-jobid="'+value.job_id+'"><td><a href="applicant/'+value.resume_id+'" target="_blank">'+value.applicant_name+'</a></td><td>'+value.timeofrequest+'</td><td>'+value.request_status+'</td></tr>');

			// $('#candidatestable').append('<tr><td><a href="applicant/'+value.applicant_id+'">'+value.applicant_name+'</a></td><td>'+value.jobcategory+'</td><td>'+value.request_status+'</td></tr>');
		});
	});
}
//End of Code

//Add Job with Validation

var $addjobform = $("#addjobform").validate({
	submitHandler: function(form) {

		var formData = new FormData($('#addjobform')[0]);
		var token = $('#addjobform > input[name="_token"]').val();
		formData.append('_token', token);

		$.ajax({
          url: '/adminaddjob',  //Server script to process data
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
				$('#addjobsubmit').addClass("disabled");
				$('#addjobsubmit').html('<i class="fa fa-gear fa-spin"></i>');
				$('#addjobfooter').prepend('<div class="alert alert-success" role="alert">Please be Patient, we are inviting available applicants</div>');
			}
		}

		function completeHandler(data)
		{
			// console.log(data);
			$('#jobstable').append('<tr id="'+data.id+'"><td>'+data.id+'</td><td><a href="job/'+data.id+'" target="_blank">'+data.job_title+'</td><td>'+data.desc+'</td><td>'+data.category+'</td><td>'+data.joblocation+'</td><td>'+data.businessname+'</td><td class="hide">'+data.gender+'</td><td class="hide">'+data.agefrom+'</td><td class="hide">'+data.ageto+'</td><td class="hide">'+data.education+'</td><td class="hide">'+data.minimumyearsofexperience+'</td><td class="hide">'+data.others+'</td><td class="hide">'+data.invitationexpiration+'</td><td><a href="#" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#listcandidatesmodal" onclick="listcandidates($(this))"><i class="fa fa-user"></i></a></td><td><a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editjobmodal" onclick="editjob($(this))"><i class="fa fa-edit"></i></a></td><td><a href="#" class="btn btn-danger btn-circle" onclick="disablejob($(this))"><i class="fa fa-times"></i></a></td></tr>');
			// $('#jobupdates').text("New Job has been added");
			// $('#jobupdates').css('display', '');
			$('#addjobsubmit').removeClass("disabled");
			$('#addjobsubmit').html('Save');
			$('#addjobfooter').children('div').remove();
			$('#addjobform').val('');
			$('#addjobmodal').modal('hide');
			// $('#jobupdates').fadeOut(2000);


			$('#addjobform')[0].reset();

			$.smallBox({
				title : data.job_title+' added',
				content : "<i class='fa fa-clock-o'></i> <i>just now...</i>",
				color : "#296191",
				iconSmall : "fa fa-thumbs-up bounce animated",
				timeout : 5000
			});
		}
	},

				// Rules for form validation
				rules : {
					company : {
						required : true
					},
					job_category : {
						required : true
					},
					job_title : {
						required : true,
						remote: '/checkJobTitle'
					},
					description : {
						required : true
					},
					gender : {
						required: true
					},
					invitationexpiration: {
						required: true, 
						date: true
					},
					agefrom: {
						required: true
					},
					ageto: {
						required: true
					}
				},

				// Messages for form validation
				messages : {
					company : {
						required : 'Please Select a Company'
					},
					job_category : {
						required : 'Please Select a Job Category'
					},
					job_title : {
						required : 'Please include a Job Title',
						remote: 'This Job Title already exist'
					},
					description : {
						required : 'Please describe the Job'
					},
					gender : {
						required : 'Please choose a qualified gender'
					},
					invitationexpiration: {
						required: 'Please add a date until invitations are active', 
						date: 'Please enter a date'
					},
					agefrom : {
						required: 'Please select minimum age qualification'
					},
					ageto : {
						required: 'Please select maximum age qualification'
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}

			});
//End of Code

//Check if any is checked
if($('input[name="anyworkexperience"]:checked').length > 0)
{
	$('[name="minimumyearsofexperience"]').attr('disabled')
}

$('[name="anyworkexperience"]').click(function(){
	if ($(this).is(":checked")) { 
		$('[name="minimumyearsofexperience"]').prop("disabled", true);
	} else {
		$('[name="minimumyearsofexperience"]').prop('disabled', false);
	}
});

$('[name="anyworkexperienceedit"]').click(function(){
	if ($(this).is(":checked")) { 
		$('#editjobform [name="minimumyearsofexperience"]').prop("disabled", true);
	} else {
		$('#editjobform [name="minimumyearsofexperience"]').prop('disabled', false);
	}
});
//End of Code

//Approve Request
function approverequest(_token, jobid, applicantid, obj)
{
	$.post('/adminapproverequest', { jobid: jobid, _token: _token, applicantid: applicantid }, function(data){
		obj.attr('data-original-title', 'Applicant is under initial screening');
		obj.attr('data-content', 'Please review the applicant\'s test results and requirements by clicking his/her name.');
		obj.removeClass('statusapproval').addClass('initialscreeningapproval');
		obj.html('initial screening');
	});
}
//End of Code

//Disapprove Request
function disapproverequest(_token, jobid, applicantid, obj)
{
	$.post('/admindisapproverequest', { jobid: jobid, _token: _token, applicantid: applicantid }, function(data){
		// obj.html('Disapprove');
		// console.log('disapproved');
		obj.parent().closest('tr').remove();
	});
}
//End of Code

//Shorten desc

$(".show-more").click(function () {
	if($(".text").hasClass("show-more-height")) {
		$(this).text("(Show Less)");
	} else {
		$(this).text("(Show More)");
	}

	$(".text").toggleClass("show-more-height");
});

//End of Code

//Check if taken tests
function checkIfTakenTest()
{
	// var status;

	$.get('/checkiftakentests', {}, function(data){
		return data;
	});
}
//End of Code

//Accept Invitation
function acceptinvitation(obj)
{
	// var status = checkIfTakenTest();

	// if (status != 'all tests taken!')
	// {
	// 	$('#alertModal').modal('show');
	// 	return false;
	// }

	var applicantid = obj.attr('data-applicantid');
	var jobid = obj.attr('data-jobid');
	var _token = $('#applyjobform > input[name="_token"]').val();

	obj.html('Accepting Invitation... <i class="fa fa-gear fa-spin"></i>');

	$.post('/acceptinvitation', { applicantid: applicantid, jobid: jobid, _token: _token }, function(data){
		obj.addClass('disabled').hide();
		obj.siblings('a').addClass('disabled').hide();
		
		if( data.hastakenpersonalitytest == 1 && data.hastakeniqtest == 1 )
		{
			$('#compliedtestsnotification').show();
			
		} else {

			$('#thankyounotification').show();

			
			if ( data.hastakeniqtest == 0 )
			{
				$('#iqtestlink').show();
			} 

			if ( data.hastakenpersonalitytest == 0 )
			{				
				$('#personalitytestlink').show();
			}

		}
		$('#notifier').append('<div class="alert alert-info"><div class="msg"><h4> You already applied on this job.</h4></div></div>');
		// $('#thankyounotification').show();

		$('#myModal').modal('show');

	});

}
//End of Code

//Decline Invitation
function declineinvitation(obj)
{
	var applicantid = obj.attr('data-applicantid');
	var jobid = obj.attr('data-jobid');
	var _token = $('#applyjobform > input[name="_token"]').val();

	obj.html('Declining Invitation... <i class="fa fa-gear fa-spin"></i>');

	$.post('/declineinvitation', { applicantid: applicantid, jobid: jobid, _token: _token }, function(data){
		obj.addClass('disabled').hide();
		obj.siblings('a').addClass('disabled').hide();
		
		$('#notifier').append('<div class="alert alert-info"><div class="msg"><h4> <i class="fa fa-warning"></i> You were invited on this job before, but you neglected</h4></div></div>');


		// $('#myModal').modal('show');

		// console.log(data);
	});

}
//End of Code

//On Resume Submit
$('#btn_submitresume').click(function(){
	$(this).addClass('Saving...');
	$(this).html('Saving.. <i class="fa fa-gear fa-spin"></i>')
	$(this).addClass('disabled');
});
//End of Code

//Validate Education
$('[name="degree_level"]').on('change', function(){
	
	if($('[name="degree_level"]').val() == 1)
	{
		$('#field_of_study_div').hide();
	} else {
		$('#field_of_study_div').show();
	}	

});
//End of Code

//Add Staff with Validation 
$('#addstaffform').validate({

	submitHandler: function(form) {
		var formData = new FormData($('#addstaffform')[0]);
		var token = $('#addstaffform > input[name="_token"]').val();
		formData.append('_token', token);

		$.ajax({
          url: '/adminaddstaff',  //Server script to process data
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
				$('#addstaffsubmit').addClass("disabled");
				$('#addstaffsubmit').html('<i class="fa fa-gear fa-spin"></i>');
				$('#addstafffooter').prepend('<div class="alert alert-success" role="alert">Please be Patient, we are saving Employer Information</div>');
			}
		}

		function completeHandler(data)
		{
			$('#stafftable').append('<tr id="'+data.id+'"><td>'+data.id+'</td><td><img src="'+data.photo+'" class="img-circle" style="height:50px;width:50px;"></td><td><a href="staff/'+data.id+'")>'+data.last_name+', '+data.first_name+'</a></td><td>'+data.email+'</td><td>'+data.phone_number+'</td><td>'+data.address+'</td><td><a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editstaffmodal" onclick="editstaff($(this))"><i class="fa fa-edit"></i></a></td><td><a href="#" class="btn btn-danger btn-circle" onclick="disablestaff($(this))"><i class="fa fa-times"></i></a></td></tr>');
			// $('#staffupdates').text("New Category has been added");
			// $('#staffupdates').css('display', '');
			$('#addstaffsubmit').removeClass("disabled");
			$('#addstaffsubmit').html('Save');
			$('#addstaffsubmit').children('div').remove();
			// $('#addstaffsubmit').val('');
			$('#addstaffmodal').modal('hide');
			// $('#staffupdates').fadeOut(2000);
			$.smallBox({
				title : data.last_name+', '+data.first_name+' has been added',
				content : "<i class='fa fa-clock-o'></i> <i> just now...</i>",
				color : "#296191",
				iconSmall : "fa fa-thumbs-up bounce animated",
				timeout : 5000
			});
		}
	},
	
	// Rules for form validation
	rules : {
		email : {
			required : true,
			email: true,
			remote: '/checkUniqueEmail'
		},
		first_name : {
			required : true
		},
		last_name : {
			required : true
		},
		phone_number : {
			required: true,
			number: true,
			remote: '/checkStaffPhoneNumber'
		},
		address : {
			required: true
		}
	},

				// Messages for form validation
				messages : {
					email : {
						required : 'Please Fill up the Staff\'s Email',
						email: 'Please Input a Valid Email',
						remote: 'Email already exist'
					},
					first_name : {
						required : 'Please Fill up the Firstname',
					},
					last_name : {
						required : 'Please Fill up the Lastname',
					},
					phone_number : {
						required: 'Please Fill up the Phone Number',
						number: 'Please enter a valid phone number',
						remote: 'Phone Number Already Exist'
					},
					address : {
						required: 'Please Fill up Address'
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});//End of Code

//Reply

$('#replyform').validate({
	submitHandler: function(form) {
		var formData = new FormData($('#replyform')[0]);
		var token = $('#replyform > input[name="_token"]').val();
		var subject = $('#replyform > input[name="subject"]').val();
		formData.append('_token', token);
		formData.append('subject', subject);

		$.ajax({
          url: '/replymessage',  //Server script to process data
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
				$('#btn_send').addClass('disabled');
				$('#btn_send').html('Sending... <i class="fa fa-cog fa-spin"></i>');
			}
		}

		function completeHandler(data)
		{
			$('[name="attachment"]').val('');
			$('[name="message"]').val('');
			$('.replypane').append('');
			$('#btn_send').removeClass('disabled');
			$('#btn_send').html('Send');
		}
	},
	// Rules for form validation
	rules : {
		email : {
			required : true
		}
	},

	// Messages for form validation
	messages : {
		email : {
			required : 'Please Include a message before proceeding'
		}
	},

	// Do not change code below
	errorPlacement : function(error, element) {
		error.insertAfter(element.parent());
	}
});
//End of Code

//Reply Attachment
$('#replyattachmenttrigger').click(function(){
	$('#replyattachment').trigger('click');
});

$('#replyattachment').change(function(){
	// alert($('#replyattachment').val());
	var formData = new FormData($('#replyform')[0]);
	var _token = $('#replyform > input[name="_token"]').val();
	// var replyattachment = $('#replyattachment').val();
	formData.append('_token', _token);


	$.ajax({
          url: '/adduserattachment',  //Server script to process data
          type: 'POST',

          xhr: function() {  // Custom XMLHttpRequest
          	var myXhr = $.ajaxSettings.xhr();
                          if(myXhr.upload){ // Check if upload property exists
                              myXhr.upload.addEventListener('progress',progressHandler, false); // For handling the progress of the upload
                          }
                          return myXhr;
                      },
                      success: completeHandler,
                      error: errorHandler,

          // Form data
          data: formData,
          
          //Options to tell jQuery not to process data or worry about content-type.
          cache: false,
          contentType: false,
          processData: false,// what type of data do we expect back from the server
          encode	: true
      });

	function progressHandler(e){
		$('#replyattachmenttrigger').hide();

		if(e.lengthComputable){

			$('#attachmentshere').append('<div id="statusprogress">Uploading....' + Math.floor(e.loaded/e.total*100) + '%</div>');
		}
	}

	function completeHandler(data)
	{
		// $('#statusprogress').remove();
		
	}

	function errorHandler(e)
	{
		alert('failed');
	}

});
//End of Code

//Add Employer Contract
$('#contract_form').validate({
	submitHandler: function(form) {
		var formData = new FormData($('#contract_form')[0]);
		var token = $('#contract_form > input[name="_token"]').val();
		formData.append('_token', token);

		$.ajax({
          url: '/adminsaveemployercontract',  //Server script to process data
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
				// console.log('processing');
				$('#addemployercontractsubmit').addClass("disabled");
				$('#addemployercontractsubmit').html('<i class="fa fa-gear fa-spin"></i>');
				$('#addemployercontractfooter').prepend('<div class="alert alert-success" role="alert">Please be Patient, we are saving Employer Information</div>');

			}
		}

		function completeHandler(data)
		{
			// console.log(data);
			$('#employercontracttable').append('<tr id="'+data.id+'""><td>'+data.id+'</td><td>'+data.contract_title+'</td><td>'+data.salary+'</td><td>'+data.cut_off_period+'</td><td>'+data.job_title+'</td><td>'+data.num_of_employees+'</td><td>'+data.businessname+'</td><td><a href="#" class="btn btn-danger btn-circle" onclick="disablecontract($(this))"><i class="fa fa-times"></i></a></td></tr>');
			
			$("#contract_form")[0].reset();

			$('#addemployercontractmodal').modal('hide');
			$('#addemployercontractsubmit').removeClass("disabled");
			$('#addemployercontractsubmit').html('Save');
			$('#addemployercontractfooter').children('div').remove();

			$.smallBox({
				title : data.contract_title+' added',
				content : "<i class='fa fa-clock-o'></i> <i>just now...</i>",
				color : "#296191",
				iconSmall : "fa fa-thumbs-up bounce animated",
				timeout : 5000
			});
		}
	},
	
	// Rules for form validation
	rules : {
		contract_title : {
			required : true
		},
		salary : {
			required : true,
			number: true
		},
		cut_off_period : {
			required : true
		},
		job : {
			required : true
		},
		num_of_employees : {
			required : true,
			number : true
		},
		employer : {
			required: true
		}
	},

				// Messages for form validation
				messages : {
					contract_title : {
						required : 'Please Include Contract Title'
					},
					salary : {
						required : 'Please Include Salary',
						number : 'Salary must be a number'
					},
					cut_off_period : {
						required : 'Please select cut off period'
					},
					job : {
						required : 'Please select a job'
					},
					num_of_employees : {
						required : 'Please set number of Employees',
						number : 'Please input number only'
					},
					employer : {
						required : 'Please include an employer'
					}

				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}

			});

//End of Code


//Add Schedule for Interview	

$('#addeventform').validate({
	submitHandler: function(form) {
		var token = $('#addeventform > input[name="_token"]').val();
		var event_date_month = $('[name="event_date_month"]').val();
		var event_date_day = $('[name="event_date_day"]').val();
		var event_date_year = $('[name="event_date_year"]').val();
		var event_time_hour = $('[name="event_time_hour"]').val();
		var event_time_minute = $('[name="event_time_minute"]').val();
		var staffid = $('[name="staff"]').val();
		var applicantid = $('[name="applicant"]').val();
		var event_title = $('[name="event_title"]').val();
		var additional_notes = $('[name="additional_notes"]').val();
		var job = $('[name="job"]').val();

		

		$.post('/adminaddevent', { 

			event_date_month: event_date_month, 
			event_date_day: event_date_day, 
			event_date_year: event_date_year,
			event_time_hour: event_time_hour,
			event_time_minute: event_time_minute,
			_token: token,
			staffid: staffid,
			applicantid: applicantid,
			event_title: event_title,
			additional_notes: additional_notes,
			job: job
			
		}, function(data){
			$('#calendar').fullCalendar( 'refetchEvents' );
			$.smallBox({
				title : "Added a Schedule for Interview",
				content : "<i class='fa fa-clock-o'></i> <i> just now...</i>",
				color : "#296191",
				iconSmall : "fa fa-thumbs-up bounce animated",
				timeout : 5000
			});
			$('#addeventmodal').modal('hide');
		});

	},
	rules : {
		event_title : {
			required : true
		}, 
		staff : {
			required : true
		}, 
		applicant : {
			required : true
		},
		job : {
			required : true
		}
	},

	// Do not change code below
	errorPlacement : function(error, element) {
		error.insertAfter(element.parent());
	}
});

//End of Code


//Save Applicant Evaluation
// $('#evaluate_applicant_form').validate({
// 	submitHandler: function(form) {
// 		console.log('submitted');
// 	}, 

// 	rules : {
// 		asterisks_rating : {
// 			required : true
// 		}, 
// 		mymarkdown : {
// 			required : true
// 		}
// 	},

// 	// Do not change code below
// 	errorPlacement : function(error, element) {
// 		error.insertAfter(element.parent());
// 	}

// });
//End of Code

