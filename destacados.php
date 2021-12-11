<?php
include('conexion.php');
$response=new stdClass();

$datos=array();
$i=0;
$sql="select * from Producto where existencia>10";
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($result)) {
	$obj=new stdClass();
	$obj->id_producto=$row['id_producto'];
	$obj->nombre_producto=$row['nombre_producto'];
	$obj->existencia=$row['existencia'];
	$obj->precio=$row['precio'];
	$obj->imagen=$row['imagen'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);