$( document ).ready(function() {
$('#form_login').submit(function(e) {
e.preventDefault();
}).validate({
  debug: false,
  rules: {
    "nombre_usuario": {
      required: true
    },
    "psw": {
      required: true,
      minlength: 5,
      maxlength: 20
    }
  },
  messages: {
    "nombre_usuario": {
    required: "Introduce tu nombre."
  },
    "psw": {
    required: "Introduce tu código postal.",
    maxlength: "Debe contener 5 dígitos.",
    minlength: "Debe contener 5 dígitos."
  }
  }
});
});
