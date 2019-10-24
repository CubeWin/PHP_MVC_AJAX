var inicio = new Inicio();

var deleteUser = (a) => {
	inicio.eliminarUser(a);
	inicio.listarUsers();
}

var saveUser = () =>{
	var id = $("[name='idInicio']").val();
	var usuario = $("[name='usuarioInicio']").val();
	var clave = $("[name='claveInicio']").val();
	var repetir = $("[name='repetirInicio']").val();
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
	$("[name='idInicio']").val("");
	$("[name='usuarioInicio']").val("");
	$("[name='claveInicio']").val("");
	$("[name='repetirInicio']").val("");
	$("[name='usuarioInicio']").attr("disabled", false);
	$("[name='claveInicio']").attr("placeholder", "");
	$("[name='repetirInicio']").attr("placeholder", "");
}

$().ready(() => {
	$("#usuarioRegistro").validate();
})