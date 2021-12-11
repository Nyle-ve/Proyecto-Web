<?php
include('conexion.php');
$response=new stdClass();
session_start();
$datos=array();
$id_usuario=$_SESSION['id_usuario'];
$i=0;
$sql="SELECT SUM(precio) AS total FROM Pedidos INNER JOIN Producto ON Pedidos.idProducto = Producto.id_producto WHERE id_usuario = $id_usuario";
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($result)) {
	$obj=new stdClass();
	$obj->total=$row['total'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);