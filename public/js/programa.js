window.onload = function() {
    validarFormulario();
    buscarUsuario();
    buscarCoche();
    borrarCoche();
    ordenarPorPrecioAscendente();
    ordenarPorPrecioDescendente();
    cambiarValorVenta();
};

function cambiarValorVenta(){
  $('#cambiosVenta').hide();
  $('#enviarCorreo').hide();
  $('#solicitarPago').hide();
  console.log($('#estadoVenta').val());
  $valor = $('#estadoVenta').val();
  console.log($valor);
  if( $valor == 'Pagado') {
    $('#enviarCorreo').show();
  } else {
    $('#solicitarPago').show();

  }
  $('#estadoVenta').change( function() {
    //alert("El estado cambió");
    $valor = $('#estadoVenta').val();   
    $('#cambiosVenta').show();
    if( $valor == 'Pagado') {
      $('#enviarCorreo').show();
    }
  });

}

function buscarUsuario() {
  $("#misUsuarios").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    console.log(value);
    $("#listaUsuarios tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
}

function validarFormulario() {
  $(".registrarse").on("click", function() {
    var dni = $("#dni").val();
    validarDNI(dni); //poner un if por lo de la letra
  });
}

function validarDNI(dni) {
  var numero
  var letr
  var letra
  var expresion_regular_dni
  expresion_regular_dni = /^\d{8}[a-zA-Z]$/;
  if (expresion_regular_dni.test(dni) == true) {
    numero = dni.substr(0, dni.length - 1);
    letr = dni.substr(dni.length - 1, 1);
    letr = letr.toUpperCase();
    numero = numero % 23;
    letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
    letra = letra.substring(numero, numero + 1);
    if (letra != letr.toUpperCase()) {
      $(".errorDNI").show();
      alert("Dni incorrecto");
      return false;
    } else {
      return true;
    }
  } else {
    alert('Dni erroneo, formato no válido');
  }
}
function borrarCoche(){
  $('.borrarCoche').on("click", function() {
    console.log("Hola estamos borrando coche");

    alert("Seguro que quiere borrar este coche?.");
  });
}

/*******************SLIDER***********************/

var slideIndex = 1;
    showDivs(slideIndex);
function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
/*******************SLIDER***********************/

function buscarCoche() {
  $("#misCoches").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    console.log(value);
    $(".sectionCoche .infoCoche").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
}

function ordenarPorPrecioAscendente(){
  $('#ordenarAscendente').on('click', function() {
    console.log('ordenando coches por precio');
    var divOrder = $(".sectionCoche > .infoCoche > #precio").sort(function (a, b) {//me guardo el precio para compararlo
      var a = $(a).data('sort');
        var b = $(b).data('sort')
        return (a > b) ? (a > b) ? 1 : 0 : -1;
    });
      console.log(divOrder.parent());    
    $(".sectionCoche").html("");//para vaciar el contenedor
    $(".sectionCoche").append(divOrder.parent());//añade los elementos ya ordenados 
    //incluido con el elemento padre que es el que tiene toda la info del coche
  });
}
function ordenarPorPrecioDescendente(){
  $('#ordenarDescendente').on('click', function() {
    console.log('ordenando coches por precio');
    var divOrder = $(".sectionCoche > .infoCoche > #precio").sort(function (a, b) {//me guardo el precio para compararlo
      var a = $(a).data('sort');
        var b = $(b).data('sort')
        return (a < b) ? (a < b) ? 1 : 0 : -1;
    });
      console.log(divOrder.parent());    
    $(".sectionCoche").html("");//para vaciar el contenedor
    $(".sectionCoche").append(divOrder.parent());//añade los elementos ya ordenados 
    //incluido con el elemento padre que es el que tiene toda la info del coche
  });
}