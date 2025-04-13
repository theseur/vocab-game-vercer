import{wordRequest} from "./wordChange.js";

let birdPosition=0;
let flyingSpeed=5;
let birdDiv=document.getElementById("bird");

export function resetBirdposition()
{
    flyingSpeed=5;
    birdPosition=0;
}

function birdMovement()
{
    birdPosition=birdPosition+flyingSpeed;
    if(birdPosition>window.innerWidth)
    {
        birdPosition=0;
        wordRequest();
    }
    birdDiv.style.left=birdPosition+"px";

}

export function flySpeed(newFlySpeed)
{
    flyingSpeed=newFlySpeed;
    birdPosition=0;
}

if(window.location.pathname==="/api/index")
    {
        setInterval(birdMovement,33);
    }
