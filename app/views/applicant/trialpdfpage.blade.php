<!DOCTYPE html>
<html>
<head>
	<title>{{ $resume->first_name." ".$resume->last_name." Resume"}}</title>
</head>
<body>
	<div style="">
		<table style="width:100%">
			<tr>
				<td><h1>{{ $resume->last_name }}, {{ $resume->first_name }}</h1>
					<i style="color:blue"><u>{{ $resume->user()->first()->email }}</u></i><br/>
					{{ $resume->address }}<br>
					{{ $resume->phone_number }}<br></td>
					<td style="align:right"> <img src="{{ public_path().$resume->photo }}" style="max-height:300px;max-width:200px;" alt=""/></td>	
				</tr>
				<tr><td colspan="2" >
					<table style="width:100%;align:center" >
						<tr >
							<td style="align:center"><br><i>{{ $resume->overview }}</i></td>
						</tr>
					</table></td></tr>	
				</table>


				<table style="width:100%">
					<tr>
						<td colspan="2"><u><b><br>CAREER OBJECTIVE</b></u>
							<hr style="size:5;color:black"/></td>
						</tr>
						<tr>
							<td ><b>Desired Position:</b></td>
							<td>{{ getPosition($resume->position_desired) }}</td>
						</tr>
						<tr>
							<td colspan="2"><u><b><br> PERSONAL INFORMATION</b></u>
								<hr style="size:5;color:black"/></td>
							</tr>
							<tr style="width:100%">
								<td style="width:15%"><b>Birthdate:</b></td>
								<td style="width:75%">{{ formatdate($resume->birth_date) }}</td>
							</tr>
							<tr style="width:100%">
								<td style="width:15%"><b>Age:</b></td>
								<td style="width:75%">{{ calculateAge($resume->birth_date) }}</td>
							</tr>
							<tr>
								<td>Gender:</td>
								<td>{{ Str::title($resume->gender) }}</td>
							</tr>
							<tr>
								<td><b>Marital Status:</b></td>
								<td>{{ $resume->marital_status }}</td>
							</tr>
						</table>
						@if(!is_null($educations))

						<table style="width:100%">
							<tr>
								<td colspan="3">
									<u><b><br>EDUCATIONAL ATTAINMENT</b></u>
									<hr style="size:5;color:black"/>
								</td>
							</tr>
							<tr>
								<td><b>School Name</b></td>
								<td style="text-align:center"><b>Degree Level</b></td>
								<td style="text-align:center"><b>From - To</b></td>
							</tr>
							@foreach($educations as $education)
							<tr><td>{{ $education->school_name }}</td>
								<td style="text-align:center">{{ $education->degreelevel()->first()->levelname }}</td>
								<td style="text-align:center">({{ $education->year_from_education }} - {{ $education->year_to_education }})</td>
							</tr>
							@endforeach
							@endif
							<tr>
								<td colspan="3">
									<u><b><br>WORK EXPERIENCE</b></u>
									<hr style="size:5;color:black"/>
								</td>

							</tr>
							@if(!is_null($jobhistories))
							<tr>
								<td><b>Company Name</b></td>
								<td style="text-align:center"><b >Title</b></td>
								<td style="text-align:center"><b>From - To</b></td>
							</tr>
							@foreach($jobhistories as $jobhistory)
							<tr>
								<td>{{ $jobhistory->company_name }}</td>
								<td style="text-align:center">{{ $jobhistory->title }}</td>
								<td style="text-align:center">({{ $jobhistory->month_from.' '.$jobhistory->year_from }} - {{ $jobhistory->month_to.' '.$jobhistory->year_to }} )</td>
							</tr>
							@endforeach
							@endif
						</table>
					</div>
				</body>
				</html>
