import{letrahely} from"./ladder.js";

function jumpRomeo()
{
    console.log(letrahely());
    $("#romeo").css("left", letrahely()+"px");
}
$(".ladder").on("click", jumpRomeo);