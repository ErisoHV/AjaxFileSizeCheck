<html>
	<head>
	<title>Ajax File Uploader Plugin For Jquery Modified by EH</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="ajaxfileupload.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/ajaxfileupload.js"></script>
	<script type="text/javascript" src="js/myFileValidator.js"></script>
	</head>

	<body>
<div id="wrapper">
    <div id="content">
    	<h1>Ajax File Upload Demo</h1><br>
		<p><em>This plugin has been modified to validate the size of a file before it is sent by POST</em></p>
		<p>Font: <a href=" http://www.phpletter.com/Our-Projects/AjaxFileUpload/">AjaxFileUpload by 
		yvind Saltvik</a></p>
		<br>
		<p style="font-weight:bold;">Please select a file and click Upload button</p>
		<img id="loading" src="images/loading.gif" style="display:none;">
		<div id="error" class="error"><span></span></div>
		<div id="correcto" class="correcto"><span></span></div>
		<form name="form" id ='form' action="ajaxfileprocess/post.php" method="POST" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" class="tableForm">
		<tbody>
			<tr><td>Your name:</td><td><input type="text" size="45" name="nombre" class="input"></td></tr>
			<tr><td>PDF (max: 1000000 bytes):</td><td id = "file1"><input id="fileToUpload" type="file" 
			size="45" name="adjuntos[]" class="input" onChange="validate(this,'pdf',1000000);" ></td></tr>		
			<tr><td>JPG (max: 500000 bytes):</td><td id = "file2"><input id="fileToUpload2" type="file" 
			size="45" name="adjuntos[]" class="input" onChange="validate(this,'jpg',500000);" ></td></tr>
		</tbody>
		</table>
		<div style="text-align:center;"><button class="button" id="buttonUpload" >Upload</button></div>
		</form>    	
    </div>
	<a href=""></a>
</body>
</html>