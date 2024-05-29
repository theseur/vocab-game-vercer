import{megoldas} from"./wordChange.js";
import{wordRequest} from"./wordChange.js";
import{flySpeed} from"./bird.js";

let pont=0;
let pontDiv=document.getElementById("pont");

function rotateLadder(e)
{
    $(".ladder").css("transform", "rotate(90deg)");
    e.currentTarget.style.transform= "rotate(0deg)";
    $(".ladder").css("bottom", "-40px");
    e.currentTarget.style.bottom="50px";
      console.log(e.currentTarget) ;
      console.log(megoldas()) ;
      flySpeed(0);
      setTimeout(()=>
        {
            if(e.currentTarget.dataset.divIndex==megoldas())
                {
                    
                    pont++;
                    pontDiv.innerHTML="Pontjaid száma: "+pont;
        
                    alert("jó");
                }
        
                else
                {
                    alert("nem jó");
                }
                wordRequest();
                visszatesz();
                flySpeed(5);

      }, 1000);
    

}

function visszatesz()
{
    $(".ladder").css("transform", "rotate(90deg)");
    $(".ladder").css("bottom", "-40px");
}
$(".ladder").on("click", rotateLadder);

