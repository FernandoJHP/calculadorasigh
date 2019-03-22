
document.getElementById("demo").style.fontSize = "25px";
//document.getElementById('demo').style.display = "none";
document.getElementById("demo").style.display = "block";

function HolaMundo(){
	document.getElementById("demo").innerHTML = "Hello World!";
}

function Sumar(){
	var n1 = document.getElementById('n1txt').value;
	var n2 = document.getElementById('n2txt').value;
	var suma =  parseInt(n1) + parseInt(n2);
	document.getElementById('rSuma').innerHTML = suma;
}