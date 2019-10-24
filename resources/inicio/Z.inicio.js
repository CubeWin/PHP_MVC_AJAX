//ALTERNATIVA SIN JQUERY
var inicio = new Inicio();

var deleteUser = (a) => {
	inicio.eliminarUser(a);
	inicio.listarUsers();
}

var saveUser = () =>{
    var id = document.querySelector('[name = "idInicio"]')['value'];
    var usuario = document.querySelector('[name = "usuarioInicio"]')['value'];
    var clave = document.querySelector('[name = "claveInicio"]')['value'];
    var repetir = document.querySelector('[name = "repetirInicio"]')['value'];
	// console.log(url+"--"+id+"--"+usuario+"--"+clave+"--"+repetir)
	inicio.guardarUser(id, usuario, clave, repetir);
	inicio.listarUsers();
}

var validarTexto = (usuario) => {
	let regex = /^[a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00E0-\u00FC]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1\u00E0-\u00FC]*)*[a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00E0-\u00FC]+$/g;
	if (regex.test(usuario)) {
		return true;
	} else {
		return false;
	}
}

var editUser = (a) => {
	var id = a;
	inicio.editarUser(id);
}

var clearReg = () => {
    document.querySelector('[name = "idInicio"]')['value']="";
    document.querySelector('[name = "usuarioInicio"]')['value']="";
    document.querySelector('[name = "claveInicio"]')['value']="";
    document.querySelector('[name = "repetirInicio"]')['value']="";
	
    document.querySelector('[name = "usuarioInicio"]')['disabled']=false;
    document.querySelector('[name = "claveInicio"]')['placeholder']="";
    document.querySelector('[name = "repetirInicio"]')['placeholder']="";
}

$().ready(() => {
	$("#usuarioRegistro").validate();
})