
function Registrar() {
  var task = "registrar";
  var selec = document.getElementsByClassName('registrar');
  for (let i = 0; i < selec.length; i++) {
    // console.log(selec[i].value);
  if (selec[i].value === '') {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: `Falta llenar campos, por favor Ingrese todos los campos`,
    })
    return;
  }
  }
  let Referencia = document.getElementById("Referencia").value;
  let NombreCarro = document.getElementById("NombreCarro").value;
  let PlantaProduccion = document.getElementById("PlantaProduccion").value;
  let FechaProduccion = document.getElementById("FechaProduccion").value;
  let Modelo = document.getElementById("Modelo").value;
  let CiudadAlmacenamiento = document.getElementById("CiudadAlmacenamiento").value;
  // 
  Swal.fire({
    title: 'Esta Seguro?',
    text: "¡No podrás revertir esto!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, Registrar!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        method: "POST",
        url: "../../Controladores/vehiculos/vehiculos.controller.php",
        data: { Referencia,NombreCarro,PlantaProduccion,FechaProduccion,Modelo,CiudadAlmacenamiento, task }
      }).done(function (data) {
        let timerInterval
        Swal.fire({
          icon: 'success',
          title: 'Registrado!',
          html: 'Evaluacion registrada exitosamente.',
          timer: 3000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
              b.textContent = Swal.getTimerLeft()
            }, 100)
          },
          willClose: () => {
            clearInterval(timerInterval)
            window.location.href = "../../Vistas/carros/Carros.php";
            var tabla = document.getElementsByClassName('table vm no-th-brd pro-of-month')
            console.log(tabla);
          }
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
          }
        })
      }).fail(function () {
        alert("Algo salió mal");
      });
    }
  })
}


function EditarInformacion(IdReferencia) {
  var task = "ConsultaIndividual";
  $.ajax({
      method: "POST",
      url: "../../Controladores/vehiculos/vehiculos.controller.php",
      data: { task, IdReferencia }
  }).done(function (data) {
      var datos = JSON.parse(data);
      document.getElementById("EditReferencia").value = datos[0].IdReferencia;
      document.getElementById("EditNombreCarro").value = datos[0].NombreCarro;
      document.getElementById("EditPlantaProduccion").value = datos[0].PlantaProduce;
      document.getElementById("EditFechaProduccion").value = datos[0].FechaEnsamble;
      document.getElementById("EditModelo").value = datos[0].Modelo;
      document.getElementById("EditCiuedadAlmacenamiento").value = datos[0].CiudadAlmacen;
      $('#EditarInformacion').modal('show');
  }).fail(function () {
      Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Error, comuniquese con el administrador',
      })
  });

  // $('#EditarInformacion').modal('hide');
}

function EditarInformacionBD() {


  let EReferencia = document.getElementById("EditReferencia").value;
  let ENombreCarro = document.getElementById("EditNombreCarro").value;
  let EPlantaProduccion = document.getElementById("EditPlantaProduccion").value;
  let EFechaProduccion = document.getElementById("EditFechaProduccion").value;
  let EModelo = document.getElementById("EditModelo").value;
  let ECiudadAlmacenamiento = document.getElementById("EditCiuedadAlmacenamiento").value;
  var task = "EditarInformacion";

  $.ajax({
      method: "POST",
      url: "../../Controladores/vehiculos/vehiculos.controller.php",
      data: {
          task, EReferencia, ENombreCarro, EPlantaProduccion, EFechaProduccion,
          EModelo, ECiudadAlmacenamiento
      }
  }).done(function (data) {
      if (data > 0) {
          let timerInterval
          Swal.fire({
              icon: 'success',
              title: 'Actualizado!',
              html: 'Usuario Actualizado exitosamente',
              timer: 3000,
              timerProgressBar: true,
              didOpen: () => {
                  Swal.showLoading()
                  const b = Swal.getHtmlContainer().querySelector('b')
                  timerInterval = setInterval(() => {
                      b.textContent = Swal.getTimerLeft()
                  }, 100)
              },
              willClose: () => {
                  clearInterval(timerInterval)
                  window.location.href = "../../Vistas/carros/Carros.php";
                  var tabla = document.getElementsByClassName('table vm no-th-brd pro-of-month')
                  console.log(tabla);
              }
          }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                  console.log('I was closed by the timer')
              }
          })
      }
  }).fail(function () {
      Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Error, comuniquese con el administrador',
      })
  });
}

function Cerrarmodal(){
  $('#EditarInformacion').modal('hide');
}

function Cerrarmodal1(){
  $('#addnew').modal('hide');
}

function Registrarcliente() {
  var task = "registrarc";
  var selec = document.getElementsByClassName('registrarc');
  for (let i = 0; i < selec.length; i++) {
    // console.log(selec[i].value);
  if (selec[i].value === '') {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: `Falta llenar campos, por favor Ingrese todos los campos`,
    })
    return;
  }
  }
  let Nombre = document.getElementById("Nombrec").value;
  let Apellido = document.getElementById("Apellidoc").value;
  let Cedula = document.getElementById("Cedulac").value;
  // 
  Swal.fire({
    title: 'Esta Seguro?',
    text: "¡No podrás revertir esto!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, Registrar!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        method: "POST",
        url: "../../Controladores/Clientes/clientes.controller.php",
        data: { Nombre,Apellido,Cedula,task }
      }).done(function (data) {
        let timerInterval
        Swal.fire({
          icon: 'success',
          title: 'Registrado!',
          html: 'Evaluacion registrada exitosamente.',
          timer: 3000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
              b.textContent = Swal.getTimerLeft()
            }, 100)
          },
          willClose: () => {
            clearInterval(timerInterval)
            window.location.href = "../../Vistas/Clientes/clientes.php";
            var tabla = document.getElementsByClassName('table vm no-th-brd pro-of-month')
            console.log(tabla);
          }
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
          }
        })
      }).fail(function () {
        alert("Algo salió mal");
      });
    }
  })
}

function Editarcliente(Idcliente) {
  var task = "Consulta";
  $.ajax({
      method: "POST",
      url: "../../Controladores/Clientes/clientes.controller.php",
      data: { task, Idcliente }
  }).done(function (data) {
      var datos = JSON.parse(data);
      document.getElementById("ENombrec").value = datos[0].NombreCliente;
      document.getElementById("EApellidoc").value = datos[0].ApellidoCliente;
      document.getElementById("ECedulac").value = datos[0].Cedula;
      document.getElementById("ECedulaco").value = datos[0].Cedula;
      $('#Editarcliente').modal('show');
  }).fail(function () {
      Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Error, comuniquese con el administrador',
      })
  });

  // $('#EditarInformacion').modal('hide');
}

function EditarclienteBD() {
  let eNombre = document.getElementById("ENombrec").value;
  let eApellido = document.getElementById("EApellidoc").value;
  let eCedula = document.getElementById("ECedulac").value;
  let eCedula2 = document.getElementById("ECedulaco").value;
  var task = "Editar";
  $.ajax({
      method: "POST",
      url: "../../Controladores/Clientes/clientes.controller.php",
      data: {
           eNombre,eApellido,eCedula,eCedula2,task
      }
  }).done(function (data) {
      if (data > 0) {
          let timerInterval
          Swal.fire({
              icon: 'success',
              title: 'Actualizado!',
              html: 'Usuario Actualizado exitosamente',
              timer: 1000,
              timerProgressBar: true,
              didOpen: () => {
                  Swal.showLoading()
                  const b = Swal.getHtmlContainer().querySelector('b')
                  timerInterval = setInterval(() => {
                      b.textContent = Swal.getTimerLeft()
                  }, 100)
              },
              willClose: () => {
                  clearInterval(timerInterval)
                  window.location.href = "../../Vistas/Clientes/clientes.php";
                  var tabla = document.getElementsByClassName('table vm no-th-brd pro-of-month')
                  console.log(tabla);
              }
          }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                  console.log('I was closed by the timer')
              }
          })
      }
  }).fail(function () {
      Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Error, comuniquese con el administrador',
      })
  });
}

function Cerrarmodalc(){
  $('#Editarcliente').modal('hide');
}

function Cerrarmodalc1(){
  $('#addnew2').modal('hide');
}


function AgregarReserva() {
  let idcliente = document.getElementById("selectcliente").value;
  let idcarro = document.getElementById("selectvehiculo").value;
  var task = "Cliente";
   Swal.fire({
    title: 'Esta Seguro?',
    text: "¡No podrás Reservar este vehiculo!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, Registrar!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        method: "POST",
        url: "../../Controladores/Reserva/reserva.controller.php",
        data: { idcliente, idcarro,task }
      }).done(function (data) {
        let timerInterval
        Swal.fire({
          icon: 'success',
          title: 'Registrado!',
          html: 'Evaluacion registrada exitosamente.',
          timer: 3000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
              b.textContent = Swal.getTimerLeft()
            }, 100)
          },
          willClose: () => {
            clearInterval(timerInterval)
            window.location.href = "../../Vistas/Reserva/reserva.php";
            var tabla = document.getElementsByClassName('table vm no-th-brd pro-of-month')
            console.log(tabla);
          }
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
          }
        })
      }).fail(function () {
        alert("Algo salió mal");
      });
    }
  })
}







