$(document).ready(function () {
   

    $('#btnsendd').click(function () {

        var errores = '';

        // Validado Nombre ==============================
        if ($('#txtNombre').val() == '') {
            errores += '<p>Ingrese un nombre</p>';
            $('#txtNombre').css("border-bottom-color", "#F14B4B")
        } else {
            $('#txtNombre').css("border-bottom-color", "#d1d1d1")
        }

        // Validado apellido ==============================
        if ($('#apellidos').val() == '') {
            errores += '<p>Ingrese un apellido</p>';
            $('#apellidos').css("border-bottom-color", "#F14B4B")
        } else {
            $('#apellidos').css("border-bottom-color", "#d1d1d1")
        }


        // Validado Correo ==============================
        if ($('#email').val() == '') {
            errores += '<p>Ingrese un correo</p>';
            $('#email').css("border-bottom-color", "#F14B4B")
        } else {
            $('#email').css("border-bottom-color", "#d1d1d1")
        }

        // Validado password ==============================
        if ($('#txtPassword').val() == '') {
            errores += '<p>Ingrese una contraseña</p>';
            $('#txtPassword').css("border-bottom-color", "#F14B4B")
        } else {
            $('#txtPassword').css("border-bottom-color", "#d1d1d1")
        }

        // Validado confirmar password ==============================
        if ($('#txtConfirmar').val() == '') {
            errores += '<p>Ingrese la confirmacion de contraseña</p>';
            $('#txtConfirmar').css("border-bottom-color", "#F14B4B")
        } else {
            $('#txtConfirmar').css("border-bottom-color", "#d1d1d1")
        }

        // Validado confirmar password ==============================
        if ($('#txtConfirmar').val() == '') {
            errores += '<p>Ingrese la confirmacion de contraseña</p>';
            $('#txtConfirmar').css("border-bottom-color", "#F14B4B")
        } else {
            $('#txtConfirmar').css("border-bottom-color", "#d1d1d1")
        }

        // Validado fecha de nacimiento ==============================
        if ($('#txtFecha').val() == '') {
            errores += '<p>Ingrese una fecha de nacimiento</p>';
            $('#txtFecha').css("border-bottom-color", "#F14B4B")
        } else {
            $('#txtFecha').css("border-bottom-color", "#d1d1d1")
        }

          // Validado Rut ==============================
          if ($('#txtRut').val() == '') {
            errores += '<p>Ingrese un Rut</p>';
            $('#txtRut').css("border-bottom-color", "#F14B4B")
        } else {
            $('#txtRut').css("border-bottom-color", "#d1d1d1")
        }
 



        // ENVIANDO MENSAJE ============================
        if (errores == '' == false) {
            var mensajeModal = '<div class="modal_wrap">' +
                '<div class="mensaje_modal">' +
                '<h3>Errores encontrados</h3>' +
                errores +
                '<span id="btnClose">Cerrar</span>' +
                '</div>' +
                '</div>'

            $('body').append(mensajeModal);
        }

        // CERRANDO MODAL ==============================
        $('#btnClose').click(function () {
            $('.modal_wrap').remove();
        });
    });

});
