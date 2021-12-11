<?php
session_start();
$response=new stdClass();
if (!isset($_SESSION['id_usuario'])) {
	$response->state=false;
	$response->detail="No esta logueado";
	$response->open_login=true;
}else{
	include_once('conexion.php');
	$id_usuario=$_SESSION['id_usuario'];
	$id_producto=$_POST['id_producto'];
	$sql="INSERT INTO Pedidos
	(id_usuario, idProducto, fecha) 
	VALUES
	($id_usuario, $id_producto, now())";
	$result=mysqli_query($con,$sql);
	if ($result) {
		$response->state=true;
		$response->detail="Producto agregado al carrito";
	}else{
		$response->state=false;
		$response->detail="Error, intentelo de nuevo.";
	}
	mysqli_close($con);
}

header('Content-Type: application/json');
echo json_encode($response);