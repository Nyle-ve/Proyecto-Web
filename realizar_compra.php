<?php
include('conexion.php');
$response=new stdClass();
session_start();
$id_usuario=$_SESSION['id_usuario'];
$i=0;
$sql="INSERT INTO Compras
SELECT * FROM Pedidos
WHERE id_usuario = $id_usuario";
$result=mysqli_query($con,$sql);
if ($result) {
	$response->state=true;
	$response->detail="Compra exitosa";
}else{
	$response->state=false;
	$response->detail="Error, intentelo de nuevo.";
}

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);