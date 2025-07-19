import{ wordRequestDolgozat} from "./wordChangeDolgozat.js";
let temakorokSelect = document.getElementById("temakorok");
let targyakSelect = document.getElementById("Targyak");
let temakoridSelect = document.getElementById("temakorid");

 targyakSelect.addEventListener("change",temakorokFuggv);
 
 temakorokSelect.addEventListener("change",szavakFuggveny);

 function temakorokFuggv()
{
  console.log( targyakSelect.value);
 

  fetch('/api/temakorIndexApi/'+targyakSelect.value)
  .then(response => response.json())
    .then(data => 
    {
      console.log(data);
      temakorokSelect.style.visibility="visible";
      temakorokSelect.innerHTML=" <option value='0'>Válassz!</option>";
      for (var i=0; i<data.length; i++)
      {
        temakorokSelect.innerHTML+="<option value='"+data[i].id+"'>"+data[i].nev+"</option>";
        
      }
     
    });


    //temakorkiirasDiv.innerText=targyakDiv.value;
 
}

function szavakFuggveny(e)
{
  console.log(temakoridSelect);
  console.log(e.target.value);
  temakoridSelect.value=e.target.value;
  wordRequestDolgozat();

}