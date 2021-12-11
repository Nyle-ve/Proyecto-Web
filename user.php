<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Vestalia</title>
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="style.css">
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

	<?php
	if (isset($_SESSION['id_usuario'])) {
	?>
		<section id="carrito" class="mt-5">
			<div class="container-fluid text-center mt-2 pt-5">
				<hr class="mx-auto">
				<h1>Mis compras</h1>
				<br>
				<div id="space-list">
					
				</div>
				<hr class="mx-auto">
				<form action="logout.php" method="POST">
					<button class="login">Log Out</button>
				</form>
			</div>
		</section>
	<?php
	}else{
	?>
		<section id="contacto" class="mt-5">
			<div class="container-fluid text-center mt-2 pt-5">
				<hr class="mx-auto">
					<form action="login.php" method="POST">
						<h1>Iniciar sesión</h1>
						<h5>Email</h5>
						<input type="text" name="email" placeholder="">
						<h5>Contraseña</h5>
						<input type="password" name="pw" placeholder="">
						<br>
						<button class="login">Log In</button>
					</form>
					<?php
						if (isset($_GET['e'])) {
							switch ($_GET['e']) {
								case '1':
									echo '<p>Error de conexión</p>';
									break;
								case '2':
									echo '<p>Email inválido</p>';
									break;
								case '3':
									echo '<p>Contraseña incorrecta</p>';
									break;
								default:
									// code...
									break;
							}
						}
					?>
				<hr class="mx-auto">
			</div>
		</section>

		<section id="contacto">
			<div class="container-fluid text-center">
				<h4>ó</h4>
				<hr class="mx-auto">
				<form action="registro.php" method="POST">
					<h1>Registrarme</h1>
					<h5>Email</h5>
					<input type="text" name="email" placeholder="">
					<h5>Nombre</h5>
					<input type="text" name="nombre" placeholder="">
					<h5>Apellido paterno</h5>
					<input type="text" name="papellido" placeholder="">
					<h5>Apellido materno</h5>
					<input type="text" name="sapellido" placeholder="">
					<h5>Contraseña</h5>
					<input type="password" name="pw" placeholder="">
					<br>
					<button class="login">Registro</button>
				</form>
				<?php
					if (isset($_GET['e'])) {
						switch ($_GET['e']) {
							case '1':
								echo '<p>Error de conexión</p>';
								break;
							default:
								// code...
								break;
						}
					}
				?>
				<hr class="mx-auto">
			</div>
		</section>
	<?php
	}
	?>

	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'historial.php',
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
							'<h5 class="fecha">'+data.datos[i].fecha+'</h5>'+
						'</div>';
					}
					document.getElementById("space-list").innerHTML=html;
				},
			});
		});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>