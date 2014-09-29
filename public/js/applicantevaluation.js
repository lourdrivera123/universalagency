

            // DO NOT REMOVE : GLOBAL FUNCTIONS!
            
            $(document).ready(function() {


                /*
                 * MARKDOWN EDITOR
                 */

                 $("#evaluation").markdown({
                    autofocus:false,
                    savable: false,
                })

                 /*
            * SmartAlerts
            */
            // With Callback
            $("#smart-mod-eg1").click(function(e) {

                var _token = $('#applicantevaluationform > input[name="_token"]').val();
                var applicantid = $('[name="applicantid"]').val();
                var jobid = $('[name="jobid"]').val();

                $('html, body').animate({
                    scrollTop: $(this).offset().top }, 200);    

                $.SmartMessageBox({
                    title : "Are you sure you dont want to hire this applicant for the job?",
                    content : "",
                    buttons : '[No][Yes]'
                }, function(ButtonPressed) {
                    if (ButtonPressed === "Yes") {

                        $.post('/admindeclineApplicantUnderReview', { _token: _token, applicantid: applicantid, jobid: jobid }, function(data){

                            $('#decisionarea').html('<div class="alert alert-danger"><div class="msg">This Applicant has been declined for this Job.</div></div>');

                            $.smallBox({
                                title : "Applicant has been declined",
                                content : "<i class='fa fa-clock-o'></i> <i>just now...</i>",
                                color : "#C46A69",
                                iconSmall : "fa fa-check fa-2x fadeInRight animated",
                                timeout : 4000
                            });

                            $('html, body').animate({ scrollTop: $('#scrollpointtitle').offset().top }, 200);

                        });



                    }
                    if (ButtonPressed === "No") {

                      $('html, body').animate({ scrollTop: $('#scrollpointtitle').offset().top }, 200);

                      return 0;
                  }

              });

e.preventDefault();

})





})

//Birth Date Datepicker
    // $('#starting_date').maskedinput
    // $('#starting_date').mask('0000-00-00');
    $("#starting_date").mask("9999-99-99");
    $("#closing_date").mask("9999-99-99");

//End of Code


//Set Employee Contract
$('#recruitmentform').validate({
    submitHandler: function(form) {

        var formData = new FormData($('#recruitmentform')[0]);
        var token = $('#recruitmentform > input[name="_token"]').val();
        formData.append('_token', token);

        $.ajax({
          url: '/adminsaveemployeecontract',  //Server script to process data
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
          encode    : true
      });

        function progressHandler(e){
            if(e.lengthComputable){
                // console.log('processing');
                $('#recruitmentformsubmit').addClass("disabled");
                $('#recruitmentformsubmit').html('<i class="fa fa-gear fa-spin"></i>');
                $('#recruitmentfromfooter').prepend('<div class="alert alert-success" role="alert">Please be Patient, we are saving Employer Information</div>');
            }
        }

        function completeHandler(data)
        {


            // console.log(data);
            // $('#employercontracttable').append('<tr id="'+data.id+'""><td>'+data.id+'</td><td>'+data.contract_title+'</td><td>'+data.salary+'</td><td>'+data.cut_off_period+'</td><td>'+data.job_title+'</td><td>'+data.num_of_employees+'</td><td>'+data.businessname+'</td><td><a href="#" class="btn btn-danger btn-circle" onclick="disablecontract($(this))"><i class="fa fa-times"></i></a></td></tr>');
            
            $("#recruitmentform")[0].reset();

            $('#recruitmentformmodal').modal('hide');
            $('#recruitmentformsubmit').removeClass("disabled");
            $('#recruitmentformsubmit').html('Save');
            $('#recruitmentfromfooter').children('div').remove();

            $.smallBox({
                title : 'Employee Contract added',
                content : "<i class='fa fa-clock-o'></i> <i>just now...</i>",
                color : "#296191",
                iconSmall : "fa fa-thumbs-up bounce animated",
                timeout : 5000
            });

                      $('html, body').animate({ scrollTop: $('#scrollpointtitle').offset().top }, 200);


          window.location = '../../adminjobhires/'+data.job_id;
        }

    },

    rules : {
        job : {
            required : true
        },
        employer : {
            required : true
        },
        employee : {
            required : true
        },
        percentage : {
            required : true
        },
        basic_pay : {
            required : true
        },
        starting_date : {
            required : true
        }, 
        closing_date : {
            required : true
        }
    },

    // Do not change code below
    errorPlacement : function(error, element) {
        error.insertAfter(element.parent());
    }
});
//End of Code
