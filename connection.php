<?php


$host='localhost';
$dbusername='root';
$dbpassword='';
$dbname='patient_handbook_dev';
$Patient_Name = $_POST['name'];#"Aditya" ;
$Age =  $_POST['age'];#35.0			;#
$Gender = $_POST['gender'];##
$Contact_Details = $_POST['phone'];#"999654987"			;#
$Medical_History = 	$_POST['med'];#"Autism & Epilepsy"		;	#
$Investigations_Done = $_POST['inv'];#"RCE & IOPA"					;#
$Diagnosis =$_POST['diag']; 		#"Gen.gingivitis; DC - 16,47; Sharp cusp - 47"			;#

$conn = mysqli_connect($host,$dbusername,$dbpassword, $dbname);

if($conn->connect_error)
{
 die('Connection Failed :'.$conn->connect_error);
}
else{
	$dateOfYear = date('Y/m/d');
	$dateOfYear = explode('/',$dateOfYear);
	$date = $dateOfYear[2];
	$month = $dateOfYear[1];
	$year = $dateOfYear[0];
	$finalDate = $date."".$month."".$year;
	$random = rand(100,999);
	$Patient_Id = $finalDate."".$random;
	$stmt = $conn->prepare("INSERT INTO Details (Patient_Id,Patient_Name,Age,Gender,Contact_Details,Medical_History,Investigations_Done,Diagnosis) VALUES (?,?,?,?,?,?,?,?) ");
	$stmt->bind_param("ssdsssss",$Patient_Id,$Patient_Name,$Age,$Gender,$Contact_Details,$Medical_History,$Investigations_Done,$Diagnosis);
	$stmt->execute();
	echo " Registration Succcess. Your Donation Id is".$Patient_Id;
	echo "" .$Patient_Name;
	$stmt->close();
	$conn->close();
}
header( "refresh:10;url=test1.html" );

?>