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
	<td>clickAndWait</td>
	<td>name=yt0</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=Profile</td>
	<td></td>
</tr>
<tr>
	<td>verifyText</td>
	<td>css=h2.pull-left</td>
	<td>My Profile</td>
</tr>
<tr>
	<td>verifyText</td>
	<td>css=h3.name</td>
	<td>Tremayne Mushayahama</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=My Skills</td>
	<td></td>
</tr>
<tr>
	<td>verifyText</td>
	<td>css=h2.pull-left</td>
	<td>My Skills&nbsp;&nbsp;(0)</td>
</tr>
<tr>
	<td>verifyText</td>
	<td>css=h6</td>
	<td>Skills Gained 0</td>
</tr>
<tr>
	<td>verifyText</td>
	<td>//div[@id='gb-skill-list-accordion']/div[3]</td>
	<td>Skills To Improve 0</td>
</tr>
<tr>
	<td>verifyText</td>
	<td>//div[@id='gb-skill-list-accordion']/div[5]</td>
	<td>Skills To Learn 0</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>xpath=(//a[contains(text(),'Skill Bank')])[2]</td>
	<td></td>
</tr>
<tr>
	<td>verifyText</td>
	<td>css=h2.pull-left</td>
	<td>Skill Bank</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>xpath=(//a[contains(text(),'Mentorships')])[2]</td>
	<td></td>
</tr>
<tr>
	<td>verifyText</td>
	<td>css=h2.pull-left</td>
	<td>Mentorships</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>xpath=(//a[contains(text(),'Advice Pages')])[2]</td>
	<td></td>
</tr>
<tr>
	<td>verifyText</td>
	<td>css=h2.pull-left</td>
	<td>Advice Pages</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>css=#sidebar-selecto &gt; li &gt; a</td>
	<td></td>
</tr>
<tr>
	<td>verifyText</td>
	<td>css=h2.pull-left</td>
	<td>People</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>css=i.glyphicon.glyphicon-off</td>
	<td></td>
</tr>
</tbody></table>
</body>
</html>
