<html>
<base href="your site url" />
<head>
<script src="../../lib/jquery/js/jquery-1.7.1.min.js" type="text/javascript"></script>
</head>
<body>
<table border ="1" width="800px" align="center" width="100%"> 
	<tr>
	<td>
	<a href="index.php">Site Home</a>
	{include="admin/adminheader"}
	{include="admin/adminsitemappath"}
	<table border="1" width="100%">
		<tr>
			<td>
				{include="admin/adminleftsidebar"}
			</td>
			<td>
				{include="adminwidgets/admincontent"}
			</td>
		<tr>	
	</table>
	{include="admin/adminfooter"}
</table>
</body>
</html>

