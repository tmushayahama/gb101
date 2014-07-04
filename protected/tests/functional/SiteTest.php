<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head profile="http://selenium-ide.openqa.org/profiles/test-case">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="selenium.base" href="http://localhost/goalbook/" />
<title>SiteTest</title>
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1">
<thead>
<tr><td rowspan="1" colspan="3">SiteTest</td></tr>
</thead><tbody>
<tr>
	<td>open</td>
	<td>/goalbook/user/login</td>
	<td></td>
</tr>
<tr>
	<td>click</td>
	<td>link=Login</td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>id=UserLogin_username</td>
	<td>tremayne@example.com</td>
</tr>
<tr>
	<td>type</td>
	<td>id=UserLogin_password</td>
	<td>12345</td>
</tr>
<tr>
	<td>selectWindow</td>
	<td>null</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>name=yt0</td>
	<td></td>
</tr>
<tr>
	<td>verifyText</td>
	<td>css=h2.pull-left</td>
	<td>Home</td>
</tr>
<tr>
	<td>verifyText</td>
	<td>css=h3.gb-heading-2</td>
	<td>Recent Activities</td>
</tr>
<tr>
	<td>verifyText</td>
	<td>link=Tremayne</td>
	<td>Tremayne</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//li[@id='gb-navbar-nav']/div[3]/div/div/a</td>
	<td></td>
</tr>
</tbody></table>
</body>
</html>
