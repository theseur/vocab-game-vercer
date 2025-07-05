let temakorokSelect = document.getElementById("temakorok");
let targyakSelect = document.getElementById("Targyak");

 targyakSelect.addEventListener("change",temakorokFuggv);

 function temakorokFuggv()
{
  console.log( targyakSelect.value);
 

  fetch('/api/temakorIndexApi/'+targyakSelect.value)
  .then(response => response.json())
    .then(data => 
    {
      console.log(data);
      temakorokSelect.style.visibility="visible";
      temakorokSelect.innerHTML="";
      for (var i=0; i<data.length; i++)
      {
        temakorokSelect.innerHTML+="<option value='"+data[i].id+"'>"+data[i].nev+"</option>";
        
      }
     
    });


    //temakorkiirasDiv.innerText=targyakDiv.value;
    
 
}