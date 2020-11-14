<?php 
$servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "Sportsclub";

$con = mysqli_connect($servername,$dbUsername,$dbPassword,$dbname);
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pno = $_POST['phone'];
$email = $_POST['email'];
$pass = $_POST['password'];
if($fname!="" &&  $lname!="" && $pno!="" && $email!="" && $pass!="")
{

$sql = "INSERT INTO REGISTER VALUES ('$fname', '$lname',' $pno',' $email', '$pass')";
	
    if(mysqli_query($con,$sql)){
		echo 'Records Inserted';
	}
	else {
		echo 'not inserted';
	}
}
else{
	echo"All fields are required!";
}
?>