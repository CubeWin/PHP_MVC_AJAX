//ALTERNATIVA SIN JQUERY
class Inicio {
    constructor() {
        this.listarUsers();
    }

    listarUsers() {
        var formData = new FormData();
        formData.append('METHOD', 'usersList');

        fetch('Inicio/listarUsuarios', {
            method: "POST",
            body: formData
        })
            .then(res => res.json())
            .catch(error => console.error('Error:', error))
            .then(response => {
                console.log(response);
                var htmlSet = "";
                if (response.fail) {
                    $.toast({ title: "Error", subtitle: "", content: response.fail, type: response.tipo, delay: 15000 });
                } else {
                    for (let i = 0; i < response.length; i++) {
                        htmlSet += "<tr>";
                        htmlSet += "<td> " + (i + 1) + "</td>";
                        htmlSet += "<td> " + response[i].usuario + " </td>";
                        htmlSet += "<td> " + response[i].clave + " </td>";
                        htmlSet += "<td> <a class=\"card-link text-info\" onclick=\"editUser(" + response[i].id + ")\"><i class=\"fa fa-edit\"></i></a></td>";
                        htmlSet += "<td> <a class=\"card-link text-danger\" onclick=\"deleteUser(" + response[i].id + ")\"><i class=\"fa fa-trash\"></i></a></td>";
                        htmlSet += "</tr>";
                    }
                    document.querySelector('#listarUsuarios').innerHTML = htmlSet;
                }
            });

    }

    eliminarUser(a) {
        var formData = new FormData();
        formData.append('METHOD', 'userDelet');
        formData.append('ID', a);

        fetch('Inicio/eliminarUsuario', {
            method: "POST",
            body: formData
        })
            .then(res => res.json())
            .catch(error => console.error('Error:', error))
            .then(response => {
                if (response.success) {
                    $.toast({ title: response.success, type: response.tipo, delay: 5000 });
                } else {
                    $.toast({ title: "Error", subtitle: "", content: response.fail, type: response.tipo, delay: 5000 });
                }
            });

    }

    editarUser(a) {
        var formData = new FormData();
        formData.append('METHOD', 'userSelect');
        formData.append('ID', a);

        fetch('Inicio/seleccionarUsuario', {
            method: "POST",
            body: formData
        })
            .then(res => res.json())
            .catch(error => console.error('Error:', error))
            .then(response => {
                if (response.fail) {
                    $.toast({ title: "Error", subtitle: "", content: response.fail, type: response.tipo, delay: 5000 });
                } else {
                    document.querySelector("[name='idInicio']")['value'] = response[0].id;
                    document.querySelector("[name='usuarioInicio']")['value'] = response[0].usuario;

                    document.querySelector("[name='usuarioInicio']")['disabled'] = true;
                    document.querySelector("[name='claveInicio']")['placeholder'] = "Nueva clave";
                    document.querySelector("[name='repetirInicio']")['placeholder'] = "Repetir nueva clave";

                    document.querySelector("[name='claveInicio']").focus();
                }
            });

    }

    guardarUser(id, usuario, clave, repetir) {

        if (usuario == "") {
            document.querySelector("[name='usuarioInicio']").focus();
            $.toast({ title: "Falta ingresar usuario", type: "warning", delay: 5000 });
        } else if (clave == "") {
            document.querySelector("[name='claveInicio']").focus();
            $.toast({ title: "Falta ingresar clave", type: "warning", delay: 5000 });
        } else if (repetir == "") {
            document.querySelector("[name='repetirInicio']").focus();
            $.toast({ title: "Falta repetir clave", type: "warning", delay: 5000 });
        } else {
            if (validarTexto(usuario)) {
                if (clave.length < 4) {
                    document.querySelector("[name='claveInicio']").focus();
                    $.toast({ title: "Ingresar almenos 4 caracteres", type: "danger", delay: 5000 });
                } else if (clave != repetir) {
                    document.querySelector("[name='repetirInicio']").focus();
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

                    fetch(url, {
                        method: "POST",
                        body: formData
                    })
                        .then(res => res.json())
                        .catch(error => console.error('Error:', error))
                        .then(response => {
                            if (id == "") {
                                if (response.success) {
                                    $.toast({ title: response.success, type: response.tipo, delay: 5000 });
                                    document.querySelector("[name='usuarioInicio']")['value'] = "";
                                    document.querySelector("[name='claveInicio']")['value'] = "";
                                    document.querySelector("[name='repetirInicio']")['value'] = "";
                                } else {
                                    $.toast({ title: "Error", subtitle: "", content: response.fail, type: response.tipo, delay: 5000 });
                                }
                            } else {
                                if (response.success) {
                                    $.toast({ title: response.success, type: response.tipo, delay: 5000 });
                                    document.querySelector("[name='idInicio']")['value'] = "";
                                    document.querySelector("[name='usuarioInicio']")['value'] = "";
                                    document.querySelector("[name='claveInicio']")['value'] = "";
                                    document.querySelector("[name='repetirInicio']")['value'] = "";
                                    document.querySelector("[name='usuarioInicio']")['disabled'] = false;
                                    document.querySelector("[name='claveInicio']")['placeholder'] = "";
                                    document.querySelector("[name='repetirInicio']")['placeholder'] = "";
                                } else {
                                    $.toast({ title: "Error", subtitle: "", content: response.fail, type: response.tipo, delay: 5000 });
                                }
                            }
                        });

                }
            } else {
                document.querySelector("[name='usuarioInicio']").focus();
                $.toast({ title: "Usar caracteres validos en el usuario", type: "danger", delay: 5000 });
            }
        }
    }
}