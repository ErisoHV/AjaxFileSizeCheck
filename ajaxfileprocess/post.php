<?php
if (!empty($_FILES['adjuntos']['name'][0]) && !empty($_FILES['adjuntos']['name'][0])) {
		echo $_POST['nombre']."<br><br>";
		echo "<strong>Files: <strong><br><br>";
?>
	<table border='1'>
		<tr><td>Name</td><td>Type</td><td>Size</td></tr>
		<tr><td><?php echo $_FILES['adjuntos']['name'][0];?></td><td><?php echo $_FILES['adjuntos']['type'][0];?></td><td><?php echo $_FILES['adjuntos']['size'][0];?></td></tr>
		<tr><td><?php echo $_FILES['adjuntos']['name'][1];?></td><td><?php echo $_FILES['adjuntos']['type'][1];?></td><td><?php echo $_FILES['adjuntos']['size'][1];?></td></tr>
	</table>
<?php
}
else
{
	echo "Not attached files";
}
?>