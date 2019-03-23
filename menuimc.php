<!DOCTYPE html>
<html>
<head>
	<?php include('head.php') ?>
	<title>IMC</title>
</head>
<body>
	<?php include('nav.php') ?>
	<div class="container">
		<div class="card border-primary">
			<div class="card-header bg-transparent border-primary">
				<div align="left">
					INDICE DE MASA CORPORAL (IMC)
				</div>
				<div align="right">
					<a class="btn btn-primary" href="">Agregar</a>
				</div>
			</div>
			<div class="card-body text-dark">
				<h5 class="card-title">Nivel 1</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			</div>
			<div class="card-footer bg-transparent border-primary" align="center">
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item"><a class="page-link" href="#">Anterior</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<!--Script-->
	<script src="javascript/imc.js"></script>
	<?php include('script.php') ?>
</body>
</html>