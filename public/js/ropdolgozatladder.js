import { megoldas, wordRequest } from "./wordChangeDolgozat.js";
import { flySpeed, resetBirdposition } from "./bird.js";



let letrahelyepx = -1;

export function letrahely() {
    return letrahelyepx;
}

let kiserletekszama = 0;
let pont = 0;
let pontDiv = document.getElementById("pont");
let heart = document.getElementById("sziv");
let felhId = document.getElementById("userid");

function rotateLadder(e) {



    kiserletekszama++;
    let targetStyle = window.getComputedStyle(e.currentTarget);
    letrahelyepx = parseInt(targetStyle.left.substring(0, targetStyle.left.length - 2)) - 20;
    console.log(letrahelyepx);
    $(".ladder").css("transform", "rotate(90deg)");
    e.currentTarget.style.transform = "rotate(0deg)";
    $(".ladder").css("bottom", "-40px");
    e.currentTarget.style.bottom = "50px";
    console.log(e.currentTarget);
    console.log(megoldas());
    flySpeed(0);

    if (e.currentTarget.dataset.divIndex == megoldas()) {
        fetch('/api/ropdolgozatFeltoltes/?kezdesido=' + Date.now() + 'userid=' + felhId.value+'talalat=1')
            .then(response => response.json())
            .then(data => {

            }
            );

        pont++;
        pontDiv.innerHTML = "Pontjaid száma: " + pont;
        $('#sziv').attr('style', 'display: block !important');
        elemMozgatasVizszintesen("#romeo", letrahelyepx + "px", () => {
            elemMozgatasFuggolegesen("#romeo", "120px", () => {
                visszatesz(() => {
                    wordRequest();
                    alert("Rómeó szerelmet tudott vallani, kaptál egy pontot!");
                    $('#sziv').attr('style', 'display: none !important');
                    resetBirdposition();
                    if (kiserletekszama > 5) {

                    }
                });
            })

        });

    }

    else {
        fetch('/api/ropdolgozatFeltoltes/?kezdesido=' + Date.now() + 'userid=' + felhId.value+'talalat=0')
        .then(response => response.json())
        .then(data => {

        }
        );
        alert("nem jó");
        visszatesz();
        wordRequest();
    }
    flySpeed(5);

    if(kiserletekszama>5)
    {

    }

}

function visszatesz(kovetkezomuvelet) {
    setTimeout(() => {
        $(".ladder").css("transform", "rotate(90deg)");
        $(".ladder").css("bottom", "-40px");
        $("#romeo").css("left", "20px");
        $("#romeo").css("bottom", "-20px");


        if (kovetkezomuvelet != null) {
            kovetkezomuvelet();
        }
    }, 1000);

}

function elemMozgatasVizszintesen(htmlSelector, position, kovetkezoMozgas) {
    setTimeout(() => {
        $(htmlSelector).css("left", position);
        if (kovetkezoMozgas != null) {
            kovetkezoMozgas();
        }
    }, 1000);


}

function elemMozgatasFuggolegesen(htmlSelector, position, kovetkezoMozgas) {
    setTimeout(() => {
        $(htmlSelector).css("bottom", position);
        if (kovetkezoMozgas != null) {
            kovetkezoMozgas();
        }
    }, 1000);


}



$(".ladder").on("click", rotateLadder);

