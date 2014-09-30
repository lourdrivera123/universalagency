<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table border="1">
<tr>
	
		<tr>
			<td rowspan="2">Gross </td>
	
			<tr><td> Statury Deductions</td></tr>
			<tr>				
				<td>SSS </td>
				<td>SSS </td>
				<td>SSS </td>
			</tr>
		

		<tr>
	
</tr>

@foreach ($table as $row)
	<tr>

	@foreach ($row as $column)
		<td> {{$column}}   </td>
	@endforeach

	</tr>
@endforeach
</table>
</body>
</html>