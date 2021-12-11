<?php
include('conexion.php');
$response=new stdClass();
session_start();
$datos=array();
$id_usuario=$_SESSION['id_usuario'];
$i=0;
$sql="SELECT nombre_producto, precio, imagen, fecha FROM Compras INNER JOIN Producto ON Compras.id_producto = Producto.id_producto WHERE id_usuario = $id_usuario";
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($result)) {
	$obj=new stdClass();
	$obj->nombre_producto=$row['nombre_producto'];
	$obj->precio=$row['precio'];
	$obj->imagen=$row['imagen'];
	$obj->fecha=$row['fecha'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);