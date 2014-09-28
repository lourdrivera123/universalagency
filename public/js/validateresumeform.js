//Validate Time Period in job history

$('[name="month_from"],  [name="year_from"], [name="month_to"], [name="year_to"]').change(function(){
	validateTimePeriodJobHistory();
});

function validateTimePeriodJobHistory()
{
	var month_from = $('[name="month_from"]').val();
	var year_from = $('[name="year_from"]').val();
	var month_to = $('[name="month_to"]').val();
	var year_to = $('[name="year_to"]').val();


	if ( year_to >= year_from )
	{
		if ( year_to == year_from && month_to > month_from)
		{
			
			return true;
		} else if( year_to > year_from ) {

			return true;
		} else {
			$('#timeofperioderror').css('display', '');
			$('#timeofperioderror').delay(2500).fadeOut(300, function(){
				$(this).css('display', 'none');
			});

			return false;
		}
	} else {

		$('#timeofperioderror').css('display', '');
		$('#timeofperioderror').delay(2500).fadeOut(300, function(){
			$(this).css('display', 'none');
		});
		
		
		return false;
	}

}

//End of Code

//Validate Time Period for Education
$('[name="year_from_education"], [name="year_to_education"]').change(function(){
	validateTimPeriodEducation();
});

function validateTimPeriodEducation()
{
	var year_from_education = $('[name="year_from_education"]').val();
	var year_to_education = $('[name="year_to_education"]').val();

	if(year_to_education <= year_from_education)
	{
		$('#educationtimeperioderror').css('display', '');
		$('#educationtimeperioderror').delay(2500).fadeOut(300, function(){
			$(this).css('display', 'none');
		});

		return false;
	} else {
		return true;
	}
}

//End of Code

//Birth Date Datepicker
var datenow = new Date();

$('#birth_date').datepicker({
    format: "yyyy-mm-dd",
    endDate: (datenow.getFullYear('yyyy') - 18) + '-' + datenow.getMonth() + '-' + datenow.getDay()
});
//End of Code

//Validate Birth Date

var datenow = new Date();

$('#birth_date').on('changeDate', function (ev) {
	validatebirthdate();
});

function validatebirthdate()
{
	var bdate = $('#birth_date').val();
	var validyear = datenow.getFullYear('yyyy') - 18;
	var selectedyear = bdate.substring(0, 4);

	if ( parseInt(selectedyear, 10) > validyear)
	{
		$('#birthdateerror').css('display', '');
		$('#birthdateerror').delay(2500).fadeOut(300, function(){
			$(this).css('display', 'none');
		});
		
		return false;
	}
}
//End of Code