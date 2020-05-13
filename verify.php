<?php 
$conn = mysqli_connect("localhost","root","","scrp");

//if(isset($_POST['login'])){
	
	$id = $_GET['id'];
	$token = $_GET['token'];

	$select = "UPDATE accounts SET Status = 'Active' WHERE ID = '$id' AND Token = '$token'";
	$result = mysqli_query($conn,$select);
	if ($result) {
		echo "verify successful. you can log in now";
	}else{
		echo "verify faild";
	}

//}

?>