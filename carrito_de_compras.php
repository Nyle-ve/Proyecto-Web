<?php
include('conexion.php');
$response=new stdClass();
session_start();
$datos=array();
$id_usuario=$_SESSION['id_usuario'];
$i=0;
$sql="SELECT id_producto, nombre_producto, precio, imagen FROM Pedidos INNER JOIN Producto ON Pedidos.idProducto = Producto.id_producto WHERE id_usuario = $id_usuario";
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($result)) {
	$obj=new stdClass();
	$obj->id_producto=$row['id_producto'];
	$obj->nombre_producto=$row['nombre_producto'];
	$obj->precio=$row['precio'];
	$obj->imagen=$row['imagen'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);