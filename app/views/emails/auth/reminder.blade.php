<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
</head>

<body  style="background-color:#d3d3d3">

<center>

<table width="550px" align="center" border="0">
<tbody>
<tr>
    <td>
        <div style="border-radius:11px 11px 10px 10px;border:1px solid #dddddd;border-color:rgba(0,0,0,0.13);background-color:#fff"><div style="border-radius:10px 10px 0 0;font-family:'Helvetica Neue',Arial,sans-serif;font-size:24px;background-color:#00d8ff;padding:10px 10px 6px;color:#fff;font-weight:bold">
        <span style="font-size:18px;font:Helvetica Neue;color:#ffffff;display:inline-block;line-height:25pt;margin-right:1em"><img src="images/logo_wew.png" </span>
        </div>
        <div style="padding:1em">
        <div style="font-family:'Helvetica Heue',Arial,sans-serif;font-size:14px;line-height:18px">


    <table cellpadding="0" cellspacing="0" style="width:100%" border="0"><tbody>
    <tr>

<tr>
<td><br><br>To reset your password, complete this form: {{ URL::to('password/reset', array($token)) }}.<br/>
			This link will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.</td>


</tr> 
<tr>


<td><br>
</td>   </tr>
<tr><td><br>
    
</td></tr>
<tr><td><br>
<span style="font-size:9pt;color:#888888">Universal Agency</span></td></tr>

</tbody></table>


</div></div><div style="font-family:'Helvetica Heue',Arial,sans-serif;padding:15px 25px;color:#6c6c67;border-top:2px solid #dddddd;line-height:18px"><table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
<tbody><tr><td><div style="font-size:10px;color:#6c6c67;text-align:left">
<a href="teamlaravel.com" style="color:#6c6c67;text-decoration:none" target="_blank">Change notification settings</a>&nbsp;|&nbsp;
<a href="teamlaravel.com" style="color:#6c6c67;text-decoration:none" target="_blank">Privacy Policy</a>&nbsp;|&nbsp;
<a href="teamlaravel.com" style="color:#6c6c67;text-decoration:none" target="_blank">Contact Support</a></div>
<p style="color:#808080;font-family:'Helvetica Heue',Arial,sans-serif;font-size:10px;line-height:18px;margin:0">123 Davao City  © 2014 Universal Agency</p></td><td align="right">
</tr></tbody></table></div></div></td></tr></tbody></table>

</center>

</body></html>