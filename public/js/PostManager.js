
  function fetchPostDefault(formId, responseId, controller){
    fetchPost(formId, responseId, controller, false, "", null);
  }
  
  function fetchPost(formId, responseId, controller, executeFunc, functionToExecute, formData) {
    //GET FORM DATA
    if(event != null) event.preventDefault();

    let form = document.getElementById(formId);
    let data;

    if(formData == null){
      data = form instanceof HTMLFormElement ? new FormData(form) : new FormData();
    }else{
      data = new FormData();
      for(let key in formData){
        var value = formData[key];
        data.set(key, value);
      }
    }
  
    data.set('Method', formId);
    data.set('Controller', controller);
    
    //FETCH
    fetch("/index.php", {
      method: "post",
      body: data
    })
    .then((res) => { return res.text(); })
    .then((txt) => {
    
      let finalResponse = txt;
  
      console.log("Console log PostManager: \n"+finalResponse);
      
      $("#"+responseId).html(finalResponse);

      if(executeFunc == true){
        window[functionToExecute](finalResponse);
      }

    })
    .catch((err) => { console.log(err); });
    return false;
  }

  function getFormData(formId){
    let formData = new FormData(document.getElementById(formId));
    let data = [];

    for (var p of formData) {
      let name = p[0];
      let value = p[1];

      data[name] = value;
    }
    return data;
  }