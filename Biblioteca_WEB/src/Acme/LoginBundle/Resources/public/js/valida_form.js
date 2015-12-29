/*$("#form").validate({
    rules: {
      RUN: {
        required: true,
        minlength: 8,
        maxlength: 13
      },
      Nombre: {
        required: true,
        letterspace: true
      },
      Telefono: {
        required: true,
        digits: true,
        minlength: 9,
        maxlength: 9
      },
      eMail: {
        required: true,
        email: true,
        //remote: "php/validar_email_db.php"
      },
      CodLote: {
        required: true,
        digits: true,
        minlength: 6,
        maxlength: 6
      },
      Usuario: {
        required: true,
        minlength: 5,
        maxlength: 10
      },
      Profesion: {
        required: false,
        alphanumeric2: true,
        minlength: 5,
        maxlength: 45
      },
      Instituto: {
        required: false,
        alphanumeric2: true,
        minlength: 5,
        maxlength: 45
      },
      Direccion: {
        required: false,
        alphanumeric2: true,
        minlength: 5,
        maxlength: 45
      }
    },
    messages: {
      nombre: {
        lettersonly: "Por favor, escriba solo letras"
      }
    }*/
$('#Registrar').on('click', function() {
    $("#form").valid(
rules: {
      RUN: {
        required: true,
        minlength: 8,
        maxlength: 13
      },
      Nombre: {
        required: true,
        letterspace: true
      },
      Telefono: {
        required: true,
        digits: true,
        minlength: 9,
        maxlength: 9
      },
      eMail: {
        required: true,
        email: true,
        //remote: "php/validar_email_db.php"
      },
      CodLote: {
        required: true,
        digits: true,
        minlength: 6,
        maxlength: 6
      },
      Usuario: {
        required: true,
        minlength: 5,
        maxlength: 10
      },
      Profesion: {
        required: false,
        alphanumeric2: true,
        minlength: 5,
        maxlength: 45
      },
      Instituto: {
        required: false,
        alphanumeric2: true,
        minlength: 5,
        maxlength: 45
      },
      Direccion: {
        required: false,
        alphanumeric2: true,
        minlength: 5,
        maxlength: 45
      }
    },
    messages: {
      nombre: {
        lettersonly: "Por favor, escriba solo letras"
      }
    }
      );
});

/*$.validator.addMethod("rut", function(value, element) {
  return this.optional(element) || $.Rut.validar(value);
}, "Este campo debe ser un rut valido.");

$("#RUN").Rut();
$("#form").validate();*/