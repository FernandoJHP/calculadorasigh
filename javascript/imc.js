
function CalcularIMC(){
	var nPeso, nAltura, nAlturaCM, nDecimal, nResultado;
	nPeso = document.getElementById('txtPeso').value;
	nAltura = document.getElementById('txtAltura').value;
	nResultado = parseInt(nPeso) / ((parseInt(nAltura)/100) * (parseInt(nAltura)/100));

	if (nResultado < 16) {
		grado = "Delgadez severa.";
	} else if (nResultado >= 16 && nResultado <= 16.99) {
		grado = "Delgadez moderada.";
	} else if (nResultado >= 17 && nResultado <= 18.49) {
		grado = "Delgadez aceptable.";
	} else if (nResultado >= 18.5 && nResultado <= 24.99) {
		grado = "Normal.";
	} else if (nResultado >= 25 && nResultado <= 29.99) {
		grado = "Sobrepeso.";
	} else if (nResultado >= 30 && nResultado <= 34.99) {
		grado = "Obeso tipo I.";
	} else if (nResultado >= 35 && nResultado <= 39.99) {
		grado = "Obeso tipo II.";
	} else if (nResultado > 40 ) {
		grado = "Obeso tipo III.";
	}

	document.getElementById('rimc').innerHTML = Math.round(nResultado * 10)/10;
	document.getElementById('estado').innerHTML = grado;
}