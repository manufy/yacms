<base href="your site url" />
<html>
<head>
<script type="text/javascript"> src="scripts/main.js" </script>
<link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body>
<table border ="1" width="800px" align="center"> 
	<tr>
		<td>
			{include="default/header"}
			{include="default/sitemappath"}
			<table border="1" width="100%">
				<tr>
					<td>
						{include="default/leftsidebar"}
					</td>
					<td>
						{include="widgets/contenido/contenido"}		
					</td>
					<td>
						{include="default/rightsidebar"}
					</td>
				<tr>	
			</table>
			{include="default/footer"}
		</td>
	</tr>
</table>
	<a href="login.tpl">login </a> <br>
	<a href="adminusuarios.tpl">admin usuarios </a> <br>
	<a href="admin.tpl">admin </a> <br>
</body>
</html>