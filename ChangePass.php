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
Change Password
<hr>

<?php


 
if (isset($_POST['Change'])){
	
$oldPassword = trim($_POST['Old_Password']);
$newPassword = trim($_POST['New_Password']);
$confrimPassword = trim($_POST['Confrim']);
	if($newPassword == $confrimPassword){

		$query = "UPDATE AA_LOGIN SET PASSWORD='$newPassword' WHERE Password = '$oldPassword'";

			$parseRequest = oci_parse($conn, $query);
			oci_execute($parseRequest);
			//echo "success";
			echo '<script>window.location = "back.php";</script>';
	}
	else{
			echo "Confrim Password don't math";
		}
	};
oci_close($conn);
?>

<form action='ChangePass.php' method='post'>
	Old_Password <br>
	<input name='Old_Password' type='password'><br>
	New_Password<br>
	<input name='New_Password' type='password'><br>
	Confrim<br>
	<input name='Confrim' type='password'><br><br>
	<input name='Change' type='submit' value='Change'>
	
</form>