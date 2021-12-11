<?php
try{
	include('conexion.php');
	$email=$_POST['email'];
	$nombre=$_POST['nombre'];
	$papellido=$_POST['papellido'];
	$sapellido=$_POST['sapellido'];
	$pw=$_POST['pw'];
	$sql="INSERT INTO Usuario
	(nombre, papellido, sapellido, email, pw) 
	VALUES
	('$nombre', '$papellido', '$sapellido', '$email', '$pw')";
	$result=mysqli_query($con,$sql);
	if ($result) {
		header('Location: index.php');
	}else{
		//1=error de conexion.
		header('Location: user.php?e=1');
	}
}catch(Exception $e){
	echo $e->getMessage();
	die();
}