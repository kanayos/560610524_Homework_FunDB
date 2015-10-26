<?PHP
	session_start();
	// Create connection to Oracle
	$conn = oci_connect("system", "me8s", "//localhost/XE");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;
	} 
?>
Success
<hr>

<?php
if (isset($_POST['Back'])){
	session_destroy();
	echo '<script>window.location = "login.php";</script>';
}
?>


<form action='back.php' method='post'>

	<input name='Back' type='submit' value='BacK To Home'>
	
</form>