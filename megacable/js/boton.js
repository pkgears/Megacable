function ocultar_mostrar(div){
	div = document.getElementById(div);
	//Verificamos si la capa esta oculta o no y como resultado
	//indicamos que cambie su valor distinto al actual. "none" o "block"
	div.style.display!='none'?
	div.style.display='none':div.style.display='block';
}