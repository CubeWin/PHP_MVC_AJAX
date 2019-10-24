//ALTERNATIVA SIN JQUERY
var usuarios = new Usuarios();

var loginUser = () => {
    var user = document.querySelector('[name = "usuario"]')['value'];
    var password = document.querySelector('[name = "password"]')['value'];

	usuarios.loginUser(user, password);
}

var validarTexto = (usuario) => {
	// let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i;  <- PARA CORREOS
	let regex = /^[a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00E0-\u00FC]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1\u00E0-\u00FC]*)*[a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00E0-\u00FC]+$/g;
	if (regex.test(usuario)) {
		return true;
	} else {
		return false;
	}
}

$().ready(() => {
	$("#login").validate(); //ESTO NO :(
})