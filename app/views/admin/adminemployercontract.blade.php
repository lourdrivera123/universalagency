<!DOCTYPE html>
<html>
<head>
	<title>Memorandum Of Agreement</title>
</head>
<body>
	<div>
		<table style="width:100%">
			<tr>
				<td style="text-align:center;">
					<b>Memorandum Of Agreement between Universal Agency and {{ $clientname }}</b>
				</td>
			</tr>
			<tr>
				<td> <br> </td>
			</tr>
			<tr>
				<td style="text-align:justify;">
					1.	 Purpose of Agreement. This recruiting agreement is entered into and effective this date 
					{{ $date }} by and between Universal Agency and {{ $clientname }}, to find {{ Input::get('num_of_employees') }} suitable candidate/s for the position of <br>
				</td>
			</tr>
			<tr>
				<td style="padding-left:30px; padding-top:20px; text-align:justify;">
					<b> {{ Input::get('job') }} </b>
				</td>
			</tr>
			<tr> <td><br> </td></tr>
			<tr>
				<td style="text-align:justify; text-align:justify;">
					<br>2.	Undertaking of recruiter.Universal Agency agrees to use its best efforts find suitable candidates for the above named positions. The Agency’s goal is to save valuable Client time, assist in successful hiring process, and provide Client access to top candidates. Universal Agency will actively source, recruit and screen candidates. The Agency’s work normally includes, but, is not limited to the following:
				</td>
			</tr>
			<tr> <td> <br> </td></tr>
			<tr>
				<td style="padding-left:30px; padding-bottom:20px; text-align:justify;">
					1) initial need assessment with client to formulate criteria for candidate selection, corporate background, position salary, and location specifies,
				</td>
			</tr>
			<tr>
				<td style="padding-left:30px; padding-bottom:20px; text-align:justify;">
					2) identification of potential candidates through resume database review
				</td>
			</tr>
			<tr>
				<td style="padding-left:30px; padding-bottom:20px; text-align:justify;">
					3) candidate screening through resume reviews and video chat interviews, 
				</td>
			</tr>
			<tr>
				<td style="padding-left:30px; padding-bottom:20px; text-align:justify;">
					4) referral of screened and interviewed candidate resumes to client,
				</td>
			</tr>
			<tr>
				<td style="padding-left:30px; padding-bottom:20px; text-align:justify;">
					5) coordination of candidate interviews with Client, both telephone and in person,
				</td>
			</tr>
			<tr>
				<td style="padding-left:30px; padding-bottom:20px; text-align:justify;">
					6) verification of candidate references, when requested by Client,
				</td>
			</tr>
			<tr>
				<td style="padding-left:30px; padding-bottom:20px; text-align:justify;">
					7) assistance with the coordination and acceptance of job offers
				</td>
			</tr>
			@if( Input::has('others') )
			<tr>
				<td style="padding-left:30px; padding-bottom:20px; text-align:justify;">
					8) {{ Input::get('others') }}
				</td>
			</tr>
			@else

			@endif
			<tr>
				<td style="text-align:justify;">
					<br>3.	Candidate Referrals.Universal Agency will provide screened and interviewed resumes directly to the hiring authority identified within Client's organization. It is understood that Client will not disclose or share any names or information which would identify candidates or cause candidates to be referred to any third parties. All referred candidates are considered to be valid referrals from the Agency toclient. Client is not allowed to have recent and prior employment conversation with a specific candidate during the preceding recruiter’s referral of candidate to client. 
				</td>
			</tr>
			<tr>
				<td style="text-align:justify;">
					<br>4.	Compensation. In consideration of the performance of the services, for each candidate which the Universal Agency successfully recruits to work with Client (the presented candidate), the employee’s salary from the client will be directed to the Universal Agency and will be the one to dispense it to the employee. 		
				</td>
			</tr>
		</table>
	</div>
</body>
</html>