<?php
include('conexion.php');
$email=$_POST['email'];
$sql="SELECT * FROM Usuario WHERE email='$email'";
$result=mysqli_query($con,$sql);
if ($result) {
	$row=mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
	if ($count!=0) {
		$pw=$_POST['pw'];
		if ($row['pw']!=$pw) {
			//3=contraseña incorrecta.
			header('Location: user.php?e=3');
		}else{
			session_start();
			$_SESSION['id_usuario']=$row['id_usuario'];
			$_SESSION['email']=$row['email'];
			$_SESSION['nombre']=$row['nombre'];
			header('Location: index.php');
		}
	}else{
		//2=email invalido.
		header('Location: user.php?e=2');
	}
}else{
	//1=error de conexion.
	header('Location: user.php?e=1');
}