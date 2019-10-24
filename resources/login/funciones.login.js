class Usuarios {
	constructor() {

	}
	
	loginUser(user, password) {
		// alert(user+" "+password);
		if (user == "") {
			$("[name='usuario']").focus();
			$.toast({ title: "Falta ingresar usuario", type: "warning", delay: 5000 });
		} else {
			if (password == "") {
				$("[name='password']").focus();
				$.toast({ title: "Falta ingresar password", type: "warning", delay: 5000 });
			} else {
				if (validarTexto(user)) {
					if (password.length >= 4) {
						var formData = new FormData();
						formData.append('user', user);
						formData.append('password', password);
						$.ajax({
							url: "Login/listar",
							type: 'post',
							data: formData,
							contentType: false,
							processData: false,
							dataType: "json",
							success: function (response) {
								console.log(response);
								if (response.success) {
									console.log(user + " -- " + password);
									$.toast({ title: response.success, type: response.tipo, delay: 3000 });
									setTimeout(function () { window.location = "Inicio" }, 1000);
								} else {
									$.toast({ title: "Error", subtitle: "", content: response.fail, type: response.tipo, delay: 5000 });
								}
							}
						});
					} else {
						$("[name='password']").focus();
						$.toast({ title: "Ingresar almenos 4 caracteres", type: "danger", delay: 5000 });
					}
				} else {
					$("[name='usuario']").focus();
					$.toast({ title: "Usar caracteres validos en el usuario", type: "danger", delay: 5000 });
				}
			}
		}
	}
}
