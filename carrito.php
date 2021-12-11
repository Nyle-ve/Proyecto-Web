<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Vestalia</title>
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light py-2 fixed-top">
	  <div class="container-fluid">
	    <a href="index.php"><img src="img/logo.png" width="75" height="75"></a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span><i id="bar" class="far fa-bars"></i></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item">
	          <a class="nav-link" href="productos.php">Comprar</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="contacto.php">Contacto</a>
	        </li>
	        <li class="nav-item">
	          <a href="user.php"><i class="far fa-user"></i></a>
	        </li>
	        <li class="nav-item">
	          <a href="carrito.php"><i class="far fa-shopping-bag"></i></a>
	        </li>
	    </div>
	  </div>
	</nav>

	<section id="carrito" class="my-5 pb-5">
		<div class="container-fluid text-center mt-5 py-5">
			<hr class="mx-auto">
			<h1>Carrito de compras</h1>
			<hr class="mx-auto">
		</div>
		<div class="row mx-auto container-fluid" id="space-list">
			
		</div>
	</section>

	<section id="total" class="my-5 pb-5">
		<div id="subtotal">
			
		</div>
	</section>

	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'carrito_de_compras.php',
				type: 'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					for (var i = data.datos.length - 1; i >= 0; i--) {
						html+=
						'<div class="row mx-auto container-fluid">'+
							'<div class="producto1 text-center ml-5">'+
								'<img class="img-fluid mb-3" src="img/'+data.datos[i].imagen+'" width="200" height="200">'+
							'</div>'+
							'<h5 class="pnom">'+data.datos[i].nombre_producto+'</h5>'+
							'<h4 class="precio">$'+data.datos[i].precio+'</h4>'+
							'<div id="boton">'+
							'<button class="eliminar" onclick="eliminar_producto('+data.datos[i].id_producto+')">x</button>'+
							'</div>'+
						'</div>';
					}
					document.getElementById("space-list").innerHTML=html;
				},
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'calcular_total.php',
				type: 'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					for (var i = data.datos.length - 1; i >= 0; i--) {
						html+=
						'<div>'+
							'<hr class="mx-auto">'+
							'<h5>Subtotal</h5>'+
							'<h4>$'+data.datos[i].total+'</h4>'+
							'<hr class="mx-auto">'+
							'<button onclick="iniciar_compra()">Comprar</button>'+
						'</div>';
					}
					document.getElementById("subtotal").innerHTML=html;
				},
			});
		});
		function iniciar_compra(){
			$.ajax({
				url:'realizar_compra.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					if (data.state) {
						alert(data.detail);
						open_index();
						limpiar_carrito();
					}else{
						alert(data.detail);
					}
				}
			});
		}
		function open_index(){
			window.location.href="index.php";
		}
		function limpiar_carrito(){
			$.ajax({
				url:'limpiar_carrito.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					if (data.state) {
						alert(data.detail);
					}else{
						alert(data.detail);
					}
				}
			});
		}
		function eliminar_producto(id_producto){
			$.ajax({
				url:'eliminar_producto.php',
				type:'POST',
				data:{
					id_producto:id_producto
				},
				success:function(data){
					console.log(data);
					if (data.state) {
						alert(data.detail);
						f5_carrito();
					}else{
						alert(data.detail);
					}
				}
			});
		}
		function f5_carrito(){
			window.location.href="carrito.php";
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>