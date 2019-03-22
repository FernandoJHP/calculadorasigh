<!DOCTYPE html>
<html>
<head>
	<?php include('head.php') ?>
	<title>IMC</title>
</head>
<body>
	<?php include('nav.php') ?>
	<main role="main" class="container">
		<div class="row">
			<div class="card-columns">
				<div class="card border-primary">
					<div class="card-header border-primary text-primary" align="center">
						<h6>Calcular Indice de Masa Corporal (IMC)</h6>
					</div>
					<div class="card-body border-primary text-primary">
						<form class="col-sm-12">
							<div class="form-group row">
								<label for="txtPeso" class="col-sm-6 col-form-label">Peso Corporal (kg)</label>
								<div class="col-sm-6">
									<input type="number" class="form-control" id="txtPeso" min="1" pattern="^[0-9]+" placeholder="">
								</div>
							</div>				
							<div class="form-group row">
								<label for="txtAltura" class="col-sm-6 col-form-label">Estatura (cm)</label>
								<div class="col-sm-6">
									<input type="number" class="form-control" id="txtAltura" min="1" pattern="^[0-9]+" placeholder="">
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer border-primary" align="left">
						<button type="submit" class="btn btn-outline-primary" onclick="CalcularIMC()">Calcular</button>
					</div>
				</div>
				<div class="card border-primary">
					<div class="card-header border-primary text-primary" align="center">
						<h6>Resultad de IMC</h6>
					</div>
					<div class="card-body border-primary text-primary">
						<h4 class="card-title">IMC:</h4>
						<h1 class="card-title" id="rimc" align="center">?</h1>
						<h5 id="estado" align="right">?</h5>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!--Script-->
	<script src="javascript/imc.js"></script>
	<?php include('script.php') ?>
</body>
</html>