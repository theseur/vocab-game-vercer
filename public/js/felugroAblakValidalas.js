let formValt=document.getElementById("joform");
    let textValt=document.getElementById("approval");
   

    function viszzagomb() {
        window.history.back();
        
    }

    function formValidalas(e)
    {
            if(textValt.value!="igen")
            {
                e.preventDefault();
            }

    }

    



   
    formValt.addEventListener("click", formValidalas);
    