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

	<section id="contacto" class="my-5 pb-5">
		<div class="container-fluid text-center mt-5 py-5">
			<hr class="mx-auto">
			<h1>Contacto</h1>
			<p>A continuación podrás enviar tu comentario</p>
			<hr class="mx-auto">
		</div>

		<form action="guardar_comentario.php" method="POST">
			<div class="container-fluid text-center">
				<h5>Nombre</h5>
				<input type="text" name="nombre" placeholder="">
				<h5>Email</h5>
				<input type="text" name="email" placeholder="">
				<h5>Comentarios</h5>
				<input type="text" name="comentario" placeholder="" rows="4" cols="40">
			</div>
			<button class="cbot">Enviar</button>
		</form>
		<div class="container-fluid text-center">
		<?php
			if (isset($_GET['e'])) {
				switch ($_GET['e']) {
					case '1':
						echo '<p>Error de conexión</p>';
						break;
					case '2':
						echo '<p>Gracias por tus comentarios</p>';
						break;
					default:
						// code...
						break;
				}
			}
		?>
		</div>
	</section>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>