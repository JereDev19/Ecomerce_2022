$(document).ready(() =>{
  isLogged();
});

ButtonManager.registerButtonClickEvent(document.getElementById("login_icon"), () =>{
  if(UserManager.isLogged()){
    toggleLoginDropDown();
  }else{
    UserManager.redirectToLoginPage();
  }
}, false)

ButtonManager.registerButtonClickEvent(document.getElementById("logout_button"), () =>{
  logoutUser();
})

function toggleLoginDropDown(){
  let container = document.getElementById("options-container");

  if(container.classList.contains("show")){
    $("#loginDropdow").prop("aria-expanded", false);
    document.getElementById("options-container").classList.remove("show");
    $("#options-container").removeProp("data-bs-poper");
  }
  else{
    $("#loginDropdow").prop("aria-expanded", true);
    document.getElementById("options-container").classList.add("show");
    $("#options-container").prop("data-bs-poper", "none");
  }
}

function logoutUser(){
  fetchPostDefault("FormLogout", "response", "User");
  toggleLoginDropDown();
  UserManager.setLogged("false");
  
  let loginIcon = document.getElementById("login_icon");
  loginIcon.classList.add("fa-user-secret");
  loginIcon.classList.remove("fa-user");
}

function onLogin(isAdmin){
  
  let loginIcon = document.getElementById("login_icon");
  loginIcon.classList.add("fa-user");
  loginIcon.classList.remove("fa-user-secret");

  //AÑADE PARA EL PANEL ADMIN.
  if(isAdmin == true){
    addAdminPanelOption();
  }
}

function isLogged(){
  if(UserManager.isLogged()){
    //AÑADE PARA EL PANEL ADMIN.
    if(UserManager.isAdmin()){
      addAdminPanelOption();
    }

    //CAMBIA EL ICONO DEL MENU USUARIO
    let loginIcon = document.getElementById("login_icon");
    if(loginIcon.classList.contains("fa-user-secret")){
      loginIcon.classList.add("fa-user");
      loginIcon.classList.remove("fa-user-secret");
    }
  }
}

function addAdminPanelOption(){
  let aElement = document.createElement('a');
  aElement.text = "Panel de administración";
  aElement.setAttribute('href', '/Admin');
  aElement.classList.add('dropdown-item');

  let liElement = document.createElement('li');
  liElement.appendChild(aElement);

  let optionsContainer = document.getElementById('options-container');
  optionsContainer.insertBefore(liElement, optionsContainer.children[2]); //Pone la opción antes de la segunda opción
}

function userIsAdmin(){
  fetchPost('FormLogin', 'response', 'User', true, 'validateLogin');
}



