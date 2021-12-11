<?php
include('conexion.php');
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$comentario=$_POST['comentario'];
$sql="INSERT INTO Comentarios
(nombre, email, comentario) 
VALUES
('$nombre', '$email', '$comentario')";
$result=mysqli_query($con,$sql);
if ($result) {
	header('Location: contacto.php?e=2');
}else{
	//1=error de conexion.
	header('Location: contacto.php?e=1');
}