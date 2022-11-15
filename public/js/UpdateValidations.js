/*
  Validar Usuario para actualizar.
*/
function validateUser(data){

  //MOSTRAR LOS LABELS
  $(".updateUserHidden").each(function() {
    $(this).show();
  });

  //DESAPARECER LO DE BUSCAR
  $("#validateIdLabelUser").css("display", "none");
  $("#validateUserInput").css("display", "none");
  $("#validateUserButton").css("display", "none");

  //OBTENER LA INFORMACIÓN DEL JSON DEVUELTO POR PHP.
  let information = JSON.parse(data);

  console.log(information);

  //PONER UN PÁRRAFO PARA SABER QUÉ USUARIO ESTÁ ACTUALIZANDO
  $("#updateUserIdParagraph").html(information['userEmail']);

  //CAMBIAR LOS VALORES DE LOS INPUT A LOS DEL USUARIO.

  $("#nameUpdateUser").val(information['userName']);
  $("#surname1UpdateUser").val(information['userSurName1']);
  $("#surname2UpdateUser").val(information['userSurName2']);
  $("#emailUpdateUser").val(information['userEmail']);
  $("#streetUpdateUser").val(information['userStreet']);
  $("#cityUpdateUser").val(information['userCity']);
  $("#postalUpdateUser").val(information['userPostalCode']);
}

/*
  Validar Modulo para actualizar.
*/
function validateModule(checked){

  //MOSTRAR LOS LABELS, INPUTS Y BUTTONS.
  $(".updateModHidden").each(function() {
    $(this).show();
  });

  //DESAPARECER LO DE BUSCAR
  $("#validateIdLabelMod").css("display", "none");
  $("#validateModInput").css("display", "none");
  $("#validateModButton").css("display", "none");

  //OBTENER LA INFORMACIÓN DEL JSON DEVUELTO POR PHP.
  let information = JSON.parse(checked);

  //PONER UN PÁRRAFO PARA SABER QUÉ MÓDULO ESTÁ ACTUALIZANDO
  $("#updateModIdParagraph").html(information['moduleId']);

  //CAMBIAR LOS VALORES DE LOS INPUT A LOS DEL MÓDULO.

  $("#IdModuloActualizar").val(information['moduleId']);
  $("#NombreModulos").val(information['moduleName']);
  $("#DescriptionModulo").val(information['moduleDescription']);
}


/*
  Validar Producto para actualizar.
*/
function validateProduct(checked){

  //MOSTRAR LOS LABELS
  $(".updateProductHidden").each(function() {
    $(this).show();
  });

  //DESAPARECER LO DE BUSCAR
  $("#validateIdLabelProduct").css("display", "none");
  $("#validateProductInput").css("display", "none");
  $("#validateProductButton").css("display", "none");

  //OBTENER LA INFORMACIÓN DEL JSON DEVUELTO POR PHP.
  let information = JSON.parse(checked);

  //PONER UN PÁRRAFO PARA SABER QUÉ PRODUCTO ESTÁ ACTUALIZANDO
  $("#updateProductIdParagraph").html(information['productId']);

  //CAMBIAR LOS VALORES DE LOS INPUT A LOS DEL PRODUCTO.
  $("#validateProductInputHidden").val(information['productId']);
  $("#nameUpdateProduct").val(information['productName']);
  $("#priceUpdateProduct").val(information['productPrice']);
  $("#descriptionUpdateProduct").val(information['productDescription']);
  $("#discountUpdateProduct").val(information['productDiscount']);
  $("#stockUpdateProduct").val(information['productStock']);
  $("#categoriaUpdateProduct").val(information['productModule']);
}

/**
 * Validar Ingrediente para actualizar
 */
function validateIngredient(checked){
  //MOSTRAR LOS LABELS
  $(".updateIngredientHidden").each(function() {
    $(this).show();
  });

  //DESAPARECER LO DE BUSCAR
  $("#validateIdLabelIngredient").css("display", "none");
  $("#validateIngredientInput").css("display", "none");
  $("#validateIngredientButton").css("display", "none");

  //OBTENER LA INFORMACIÓN DEL JSON DEVUELTO POR PHP.
  let information = JSON.parse(checked);

  //PONER UN PÁRRAFO PARA SABER QUÉ Ingrediente ESTÁ ACTUALIZANDO
  $("#updateIngredientIdParagraph").html(information['ingredientId']);

  //CAMBIAR LOS VALORES DE LOS INPUT A LOS DEL Ingrediente.
  $("#validateIngredientInputHidden").val(information['ingredientId']);
  $("#nameUpdateIngredient").val(information['ingredientName']);
  $("#stockUpdateIngredient").val(information['ingredientStock']);
  $("#priceUpdateIngredient").val(information['ingredientPrice']);
  //$("#recipeUpdateIngredient").val(information['']);
}

/**
 * Validar Receta para actualizar
 */
function validateRecipe(checked){
  //MOSTRAR LOS LABELS
  $(".updateRecipeHidden").each(function() {
    $(this).show();
  });

  //DESAPARECER LO DE BUSCAR
  $("#validateIdLabelRecipe").css("display", "none");
  $("#validateRecipeInput").css("display", "none");
  $("#validateRecipeButton").css("display", "none");

  //OBTENER LA INFORMACIÓN DEL JSON DEVUELTO POR PHP.
  let information = JSON.parse(checked);

  //PONER UN PÁRRAFO PARA SABER QUÉ Receta ESTÁ ACTUALIZANDO
  $("#updateRecipeIdParagraph").html(information['recipeId']);

  //CAMBIAR LOS VALORES DE LOS INPUT A LOS DE la Receta.
  $("#validateRecipeInputHidden").val(information['recipeId']);
  $("#nameUpdateRecipe").val(information['recipeName']);
  $("#descriptionUpdateRecipe").val(information['recipeDescription']);
  $("#ingredientUpdateRecipe").val(information['recipeIngredient']);
}

/**
 * Validr Orden para actualizar
 */
function validateOrder(checked){
  //MOSTRAR LOS LABELS
  $(".updateOrderHidden").each(function() {
    $(this).show();
  });

  //DESAPARECER LO DE BUSCAR
  $("#validateIdLabelOrder").css("display", "none");
  $("#validateOrderInput").css("display", "none");
  $("#validateOrderButton").css("display", "none");

  //OBTENER LA INFORMACIÓN DEL JSON DEVUELTO POR PHP.
  let information = JSON.parse(checked);

  //PONER UN PÁRRAFO PARA SABER QUÉ Receta ESTÁ ACTUALIZANDO
  $("#updateOrderIdParagraph").html(information['orderId']);

  //CAMBIAR LOS VALORES DE LOS INPUT A LOS DE LA Receta.
  $("#validateOrderInputHidden").val(information['orderId']);
  $("#nameUpdateOrder").val(information['orderName']);
  $("#eventUpdateOrder").val(information['orderEvent']);
  $("#dateUpdateOrder").val(information['orderDate']);
}

/**
 * Validar Evento para actualizar
 */
function validateEvent(checked){
  //MOSTRAR LOS LABELS
  $(".updateEventHidden").each(function() {
    $(this).show();
  });

  //DESAPARECER LO DE BUSCAR
  $("#validateIdLabelEvent").css("display", "none");
  $("#validateEventInput").css("display", "none");
  $("#validateEventButton").css("display", "none");

  //OBTENER LA INFORMACIÓN DEL JSON DEVUELTO POR PHP.
  let information = JSON.parse(checked);

  //PONER UN PÁRRAFO PARA SABER QUÉ Evento ESTÁ ACTUALIZANDO
  $("#updateEventIdParagraph").html(information['eventId']);

  //CAMBIAR LOS VALORES DE LOS INPUT A LOS DEL Evento.
  $("#validateEventInputHidden").val(information['eventId']);
  $("#dateUpdateEvent").val(information['eventDate']);
  $("#startTimeUpdateEvent").val(information['eventStartTime']);
  $("#endTimeUpdateEvent").val(information['eventEndTime']);
  $("#addressTimeUpdateEvent").val(information['eventAddress']);
}

/**
 * Validar punto de venta para actualizar
 */
function validateSalesLocation(checked){
  //MOSTRAR LOS LABELS
  $(".updateSalesLocationHidden").each(function() {
    $(this).show();
  });

  //DESAPARECER LO DE BUSCAR
  $("#validateIdLabelSalesLocation").css("display", "none");
  $("#validateSalesLocationInput").css("display", "none");
  $("#validateSalesLocationButton").css("display", "none");

  //OBTENER LA INFORMACIÓN DEL JSON DEVUELTO POR PHP.
  let information = JSON.parse(checked);

  //PONER UN PÁRRAFO PARA SABER QUÉ Evento ESTÁ ACTUALIZANDO
  $("#updateSalesLocationIdParagraph").html(information['salesLocationId']);

  //CAMBIAR LOS VALORES DE LOS INPUT A LOS DEL Evento.
  $("#validateSalesLocationInputHidden").val(information['salesLocationId']);
  $("#salesLocationAddress1Update").val(information['salesLocationAddress1']);
  $("#salesLocationAddress2Update").val(information['salesLocationAddress2']);
  $("#salesLocationCityUpdate").val(information['salesLocationCity']);
  $("#salesLocationPostalCode").val(information['salesLocationPostalCode']);
}

/**
 * Validar Vendedor para actualizar
 */
 function validateSeller(checked){
  //MOSTRAR LOS LABELS
  $(".updateSellerHidden").each(function() {
    $(this).show();
  });

  //DESAPARECER LO DE BUSCAR
  $("#validateIdLabelSeller").css("display", "none");
  $("#validateSellerInput").css("display", "none");
  $("#validateSellerButton").css("display", "none");

  //OBTENER LA INFORMACIÓN DEL JSON DEVUELTO POR PHP.
  let information = JSON.parse(checked);

  //PONER UN PÁRRAFO PARA SABER QUÉ Vendedor ESTÁ ACTUALIZANDO
  $("#updateSellerIdParagraph").html(information['salesLocationId']);

  //CAMBIAR LOS VALORES DE LOS INPUT A LOS DEL Vendedor.
  $("#sellerIdUpdate").val(information['sellerId']);
  $("#sellerCompanyUpdate").val(information['sellerCompany']);
}