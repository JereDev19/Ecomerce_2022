$(document).ready(() =>{
  
  //INICIALIZAR CONTADORES:
  fetchPostDefault("UserCounter", "contadorUsuario", "User");
  fetchPostDefault("ModuleCounter", "contadorModulo", "Module");
  fetchPostDefault("PermissionCounter", "contadorPermiso", "Permission");

  //INICIALIZAR TABLAS:
  fetchPost('ListUsersAdmin', 'response', "User", true, "initializeUT", {'Page': 1, 'Init': true});
  fetchPost('ListModulesAdmin', 'response', "Module", true, "initializeMT", {'Page': 1, 'Init': true});
  fetchPost('ListPermissionsAdmin', 'response', "Permission", true, "initializePT", {'Page': 1, 'Init': true});
});

let tablaDeUsuarios; //UT (User Table)
let tablaDeModulos; //MT (Module Table)
let tablaDePermisos; //PT (Permission Table)

/** TABLA DE USUARIO */

function initializeUT(response){
  tablaDeUsuarios = new UserTable(response);
}

function setDataInTableUT(response){
  tablaDeUsuarios.setDataInTable(response);
}

/** TABLA DE MODULO */

function initializeMT(response){
  tablaDeModulos = new ModuleTable(response);
}

function setDataInTableMT(response){
  tablaDeModulos.setDataInTable(response);
}

/** TABLA DE PERMISO */

function initializePT(response){
  tablaDePermisos = new PermissionTable(response);
}

function setDataInTablePT(response){
  tablaDePermisos.setDataInTable(response);
}
