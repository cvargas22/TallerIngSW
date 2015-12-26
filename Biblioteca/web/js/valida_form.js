$("#form").validate({

  onkeyup: false,
   onclick: false,
   onfocusout: false,

    rules: {
      RUN: {
        required: true,
        minlength: 8,
        maxlength: 13,
        remote: "../php/valida_run.php"
      },
      RUN_p: {
        required: true,
        minlength: 8,
        maxlength: 13,
        remote: "../php/valida_run_p.php"
      },
      RUN_b: {
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
        required: false,
        email: true,
        //remote: "php/validar_email_db.php"
      },
      CodLote: {
        required: true,
        digits: true,
        minlength: 6,
        maxlength: 6,
        remote: "../php/valida_codlote.php"
      },
      CodLote_p: {
        required: true,
        digits: true,
        minlength: 6,
        maxlength: 6,
        remote: "../php/valida_codlote_p.php"
      },
      CodLote_b: {
        required: true,
        digits: true,
        minlength: 6,
        maxlength: 6
      },
      Usuario: {
        required: true,
        minlength: 5,
        maxlength: 10,
        remote: "../php/valida_admin.php"
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
      },
      pass2: {
        equalTo: "#pass"
      },
      MesT: {
        greaterThan: "#MesI"
      }
    },
    messages: {
      nombre: {
        lettersonly: "Por favor, escriba solo letras"
      },
      Usuario: {
        remote: "Ya existe el nombre de usuario"
      },
      pass2: {
        equalTo: "Las contraseñas deben coincidir"
      },
      RUN: {
        remote: "Ya existe el lector"
      },
      RUN_p: {
        remote: "No existe el lector"
      },
      CodLote: {
        remote: "Ya existe el lote"
      },
      CodLote_p: {
        remote: "No existe el lote"
      },
      MesT: {
        greaterThan: "La fecha debe ser mayor o igual que la inicial"
      }
    }
  });

$.validator.addMethod("rut", function(value, element) {
  return this.optional(element) || $.Rut.validar(value);
}, "Este campo debe ser un rut valido.");



$("#RUN").Rut();
$("#RUN_p").Rut();
$("#RUN_b").Rut();
$("#form").validate();