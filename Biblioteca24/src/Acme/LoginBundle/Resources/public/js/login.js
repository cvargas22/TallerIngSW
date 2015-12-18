/* Funciones para validar el LOGIN */
function validaForm(){
	return true;
}

function changeClass(aux){
	var tags = document.getElementsByClassName("active");
	for (i=0;i<tags.length;i++){
		tags[i].className="not-active";
	}
	document.getElementById(aux).className = "active";
}