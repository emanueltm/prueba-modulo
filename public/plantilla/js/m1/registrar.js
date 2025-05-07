(function () {
  'use strict'
  console.log("ya estoy dentro de function");
  
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')
  console.log(forms);
  
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        console.log(form.checkValidity());
        
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

function load_escuelas(id){

  if(id == 0){
    iziToast.warning({
      title: '¡Cuidado!',
      message: 'Selecciona una opción valida',
      position: 'topRight'
    });
  }
  else{
    $('#input-escuela').find('option').remove().end();
    $.ajax({
      type: "POST",
      url: "/escuelas",
      dataType: "json",
      data: {
        id_municipio: id
      },
      success: function(data) {
        console.log(data);
        $("#input-escuela").append($('<option>', {value: -888, text: 'Seleccione una escuela'}));
        for (let index = 0; index < data.data.length; index++) {
          $("#input-escuela").append($('<option>', {
            value: data.data[index].id_escuela,
            text: data.data[index].nombre+" | "+data.data[index].clave
          }));
        }
      }
    });
  }
  
}//end function_escuelas

function seleccionar_escuela(id_escuela){
  if(id_escuela == -888){
    iziToast.warning({
      title: '¡Cuidado!',
      message: 'Selecciona una opción valida',
      position: 'topRight'
    });
  }
}

function grado(){
  console.log("antes enviar");
  Swal.fire({
    title: "Ingresa grado y grupo",
    input: "text",
    inputLabel: "Por ejemplo, 5A, 5B o 5C",
    showCancelButton: true,
    inputValidator: (value) => {
      if (!value) {
        return "Debes ingresar información";
      }
      {
        document.getElementById("grupo").value = value;
        $('#form-escuela').submit();        
      }
    }
  });
}//end function grado

function calcular_imc(){
  const peso = parseFloat(document.getElementById("peso").value);
  const talla = parseFloat(document.getElementById("talla").value);
  const label_imc = document.getElementById("label-imc");
  const input_imc = document.getElementById("imc");

  t = talla * talla;
  let r = peso / t;
  let dos_decimales = r.toFixed(2);

  label_imc.innerText = dos_decimales;
  input_imc.value = dos_decimales;

}//end function calcular_imc

onload = function(){ 
  var ele = document.querySelectorAll('.validanumericos')[0];
  ele.onkeypress = function(e) {
     if(isNaN(this.value+String.fromCharCode(e.charCode)))
        return false;
  }
  ele.onpaste = function(e){
     e.preventDefault();
  }
}

function validar_consentimiento(id){
  const peso = document.getElementById("peso");
  const talla = document.getElementById("talla");
  const hemo = document.getElementById("hemo");

  if(id > 1){
    console.log("desabilitados");
    peso.required = false;
    peso.disabled = true;
    talla.required = false;
    talla.disabled = true;
    hemo.required = false;
    hemo.disabled = true;
  }
  else{
    console.log("habilitados");
    peso.required = true;
    peso.disabled = false;
    talla.required = true;
    talla.disabled = false;
    hemo.required = true;
    hemo.disabled = false;
  }
  
}//end function validar_consentimiento