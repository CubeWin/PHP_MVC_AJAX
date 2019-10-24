class Inicio {
	constructor() {
		this.listarUsers();
	}

	listarUsers() {
		var formData = new FormData();
		formData.append('METHOD', 'usersList');
		$.ajax({
			url: 'Inicio/listarUsuarios',
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function (response) {
				
				// $("#listarUsuarios").html(response);
				var htmlSet = "";
				if (response.fail) {
					$.toast({ title: "Error", subtitle: "", content: response.fail, type: response.tipo, delay: 15000 });
				}else{
					for (let i = 0; i < response.length; i++) {
						htmlSet += "<tr>";
						htmlSet += "<td> " + (i + 1) + "</td>";
						htmlSet += "<td> " + response[i].usuario + " </td>";
						htmlSet += "<td> " + response[i].clave + " </td>";
						htmlSet += "<td> <a class=\"card-link text-info\" onclick=\"editUser(" + response[i].id + ")\"><i class=\"fa fa-edit\"></i></a></td>";
						htmlSet += "<td> <a class=\"card-link text-danger\" onclick=\"deleteUser(" + response[i].id + ")\"><i class=\"fa fa-trash\"></i></a></td>";
						htmlSet += "</tr>";
					}
					$("#listarUsuarios").html(htmlSet);
				}
			}
		});
	}

	eliminarUser(a) {
		var formData = new FormData();
		formData.append('METHOD', 'userDelet');
		formData.append('ID', a);
		$.ajax({
			url: 'Inicio/eliminarUsuario',
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function (response) {
				if (response.success) {
					$.toast({ title: response.success, type: response.tipo, delay: 5000 });
				} else {
					$.toast({ title: "Error", subtitle: "", content: response.fail, type: response.tipo, delay: 5000 });
				}
			}
		});
	}

	guardarUser(id, usuario, clave, repetir) {

		if (usuario == "") {
			$("[name='usuarioInicio']").focus();
			$.toast({ title: "Falta ingresar usuario", type: "warning", delay: 5000 });
		} else if (clave == "") {
			$("[name='claveInicio']").focus();
			$.toast({ title: "Falta ingresar clave", type: "warning", delay: 5000 });
		} else if (repetir == "") {
			$("[name='repetirInicio']").focus();
			$.toast({ title: "Falta repetir clave", type: "warning", delay: 5000 });
		}else{
			if (validarTexto(usuario)) {
				if (clave.length < 4) {
					$("[name='claveInicio']").focus();
					$.toast({ title: "Ingresar almenos 4 caracteres", type: "danger", delay: 5000 });
				} else if (clave != repetir) {
					$("[name='repetirInicio']").focus();
					$.toast({ title: "Las claves no coinciden", type: "danger", delay: 5000 });
				} else {

					var formData = new FormData();
					formData.append('USUARIO', usuario);
					formData.append('CLAVE', clave);
					formData.append('REPETIR', repetir);
					if (id == "") {
						formData.append('METHOD', "userRegister");
						var url = "Inicio/registrarUsuario";
					} else {
						formData.append('METHOD', "userUpdate");
						var url = "Inicio/actualizarUsuario ";
						formData.append('ID', id);
					}
					$.ajax({
						url: url,
						type: 'post',
						data: formData,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function (response) {
							if (id == "") {
								if (response.success) {
									$.toast({ title: response.success, type: response.tipo, delay: 5000 });
									$("[name='usuarioInicio']").val("");
									$("[name='claveInicio']").val("");
									$("[name='repetirInicio']").val("");
								} else {
									$.toast({ title: "Error", subtitle: "", content: response.fail, type: response.tipo, delay: 5000 });
								}
							} else {
								if (response.success) {
									$.toast({ title: response.success, type: response.tipo, delay: 5000 });
									$("[name='idInicio']").val("");
									$("[name='usuarioInicio']").val("");
									$("[name='claveInicio']").val("");
									$("[name='repetirInicio']").val("");
									$("[name='usuarioInicio']").attr("disabled", false);
									$("[name='claveInicio']").attr("placeholder", "");
									$("[name='repetirInicio']").attr("placeholder", "");
								} else {
									$.toast({ title: "Error", subtitle: "", content: response.fail, type: response.tipo, delay: 5000 });
								}
							}
						}
					});
				}
			} else {
				$("[name='usuarioInicio']").focus();
				$.toast({ title: "Usar caracteres validos en el usuario", type: "danger", delay: 5000 });
			}
		}
	}

	editarUser(a) {
		var formData = new FormData();
		formData.append('METHOD', 'userSelect');
		formData.append('ID', a);
		$.ajax({
			url: 'Inicio/seleccionarUsuario',
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function (response) {
				// if (response == "true") {
				// 	$.toast({ title: "Usuario eliminado correctamente.", type: "success", delay: 5000 });
				// } else {
				// 	$.toast({ title: response, type: "warning", delay: 5000 });
				// }
				if (response.fail) {
					$.toast({ title: "Error", subtitle: "", content: response.fail, type: response.tipo, delay: 5000 });
				} else {
					$("[name='idInicio']").val(response[0].id);
					$("[name='usuarioInicio']").val(response[0].usuario);
					$("[name='usuarioInicio']").attr("disabled", true);
					$("[name='claveInicio']").attr("placeholder", "Nueva clave");
					$("[name='repetirInicio']").attr("placeholder", "Repetir nueva clave");
					$("[name='claveInicio']").focus();
				} 
			}		
		});
	}
}