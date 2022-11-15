$(document).ready(() => {
  $('#productos').DataTable({
    "scrollY": "400px",
    "scrollCollapse": true,
    "paging": false,
    "searching": false,
    "info" : false
  });
});

ButtonManager.registerButtonClickEvent(document.getElementById("btnVaciar"), () =>{
  fetchPost("DeleteCart", "response", "Cart", true, "cartDeleted");
});

ButtonManager.registerButtonClickEvent(document.getElementById("btnTermPed"), () =>{
  fetchPost("CreateOrder", "response", "Cart", true, "orderCreated");
});

function orderCreated(response){
  if(response == "Error."){
    
    document.getElementById('formulario_mensaje-error-pedido').classList.remove('display-none');
    setTimeout(() => {
      document.getElementById('formulario_mensaje-error-pedido').classList.add('display-none');
    }, 3000);

  }else{
    resetContentsTable();
    document.getElementById('formulario_mensaje-success-pedido').classList.remove('display-none');
    setTimeout(() => {
      document.getElementById('formulario_mensaje-success-pedido').classList.add('display-none');
    }, 3000);

    setTimeout("location.href = '/Order/get/"+response+"'", 5000);
  }
}

function cartDeleted(response){
  if(response == "Success."){
    resetContentsTable();
    document.getElementById('formulario_mensaje-success-vaciar').classList.remove('display-none');
    setTimeout(() => {
      document.getElementById('formulario_mensaje-success-vaciar').classList.add('display-none');
    }, 3000);

  }else{
    resetContentsTable();
    document.getElementById('formulario_mensaje-error-vaciar').classList.remove('display-none');
    setTimeout(() => {
      document.getElementById('formulario_mensaje-error-vaciar').classList.add('display-none');
    }, 3000);

  }
}

function resetContentsTable(){
  document.getElementById("productos").tBodies[0].innerHTML = '<tr class="odd"><td valign="top" colspan="4" class="dataTables_empty">No data available in table</td></tr>'; //Limpia la tabla
  $("#orderPrice").html("$UYU 0");
  setProductCounter(0);
}