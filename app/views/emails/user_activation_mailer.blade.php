<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Confirmation</title>
</head>

<body  style="background-color:#d3d3d3">

<center>

<table width="550px" align="center" border="0">
<tbody>
<tr>
    <td>
        <div style="border-radius:11px 11px 10px 10px;border:1px solid #dddddd;border-color:rgba(0,0,0,0.13);background-color:#fff"><div style="border-radius:10px 10px 0 0;font-family:'Helvetica Neue',Arial,sans-serif;font-size:24px;background-color:#00d8ff;padding:10px 10px 6px;color:#fff;font-weight:bold">
        <span style="font-size:18px;font:Helvetica Neue;color:#ffffff;display:inline-block;line-height:25pt;margin-right:1em"><img src="{{ URL::asset('images/logo_wew.png') }}" </span>
        </div>
        <div style="padding:1em">
        <div style="font-family:'Helvetica Heue',Arial,sans-serif;font-size:14px;line-height:18px">


    <table cellpadding="0" cellspacing="0" style="width:100%" border="0"><tbody>
    <tr>

<td style="font-size:10.5pt;width:100%"><b>Hi {{UCfirst($firstname)}},</b> 
<tr>
<td><br><br>You just signed up Universal Agency! <br> Please confirm your email by clicking the button below </td>

</tr> 
<tr>

<td><br>
    <p align="left" style="overflow:hidden;padding-top:3px"><a style="display:inline-block;background:#7ada4a;background:#7ada4a -webkit-linear-gradient(top,#7ada4a 0,#62c831 97%,#53bf29 98%,#53bf29 100%);background:#7ada4a -moz-linear-gradient(top,#7ada4a 0,#62c831 97%,#53bf29 98%,#53bf29 100%);background:#7ada4a -o-linear-gradient(top,#7ada4a 0,#62c831 97%,#53bf29 98%,#53bf29 100%);background:#7ada4a linear-gradient(top,#7ada4a 0,#62c831 97%,#53bf29 98%,#53bf29 100%);color:#fff;border:1px solid #6bae58;border-bottom-color:#128d2d;border-top-color:#6bbe50;border-radius:6px;text-decoration:none;font-family:Arial,Verdana,sans-serif;font-weight:bold;font-size:15px;padding:10px 20px;text-align:center" href="{{URL::to('signin/activate', array($token)) }}" target="_blank">Confirm Email</a></p>
</td>   </tr>
<tr><td><br>
    Thank you.
    
</td></tr>
<tr><td><br>
<span style="font-size:9pt;color:#888888">Universal Agency</span></td></tr>

</tbody></table>


</div></div><div style="font-family:'Helvetica Heue',Arial,sans-serif;padding:15px 25px;color:#6c6c67;border-top:2px solid #dddddd;line-height:18px"><table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
<tbody><tr><td><div style="font-size:10px;color:#6c6c67;text-align:left">
<a href="teamlaravel.com" style="color:#6c6c67;text-decoration:none" target="_blank">Privacy Policy</a>&nbsp;|&nbsp;
<a href="http://teamlaravel.com/contact" style="color:#6c6c67;text-decoration:none" target="_blank">Contact Support</a></div>
<p style="color:#808080;font-family:'Helvetica Heue',Arial,sans-serif;font-size:10px;line-height:18px;margin:0"> V. Co. Building, D. Suazo Street, Davao City, Davao Del Sur  © 2014 Universal Agency</p></td><td align="right">
</tr></tbody></table></div></div></td></tr></tbody></table>

</center>

</body></html>