<?php
include('conexion.php');
$response=new stdClass();
session_start();
$id_usuario=$_SESSION['id_usuario'];
$id_producto=$_POST['id_producto'];
$i=0;
$sql="DELETE FROM Pedidos WHERE id_usuario=$id_usuario AND idProducto=$id_producto";
$result=mysqli_query($con,$sql);
if ($result) {
	$response->state=true;
	$response->detail="Producto eliminado.";
}else{
	$response->state=false;
	$response->detail="Error, intentelo de nuevo.";
}

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);