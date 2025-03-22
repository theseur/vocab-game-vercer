let megoldasVar=-1;
let szoSzedetId=-1;

export function megoldas()
{
  return megoldasVar;
}

export function joId()
{
  return szoSzedetId;
}

export function wordRequest()
{
    let id=document.getElementById("temakorid");
    fetch('/api/ropdolgozat/'+id.value)
.then(response => response.json())
.then(data => 
    {
        //console.log(data );
       let x= Math.floor(Math.random()*5);
       megoldasVar=x;
       szoSzedetId=data[x].id;
        $("#white-flag div").html(data[x].angol);


        $( ".ladder div" ).each(function( index ) {
          //  console.log( index + ": " + $( this ).text() );
            $( this ).text(data[index].magyar) ;
          });
        
        
    }

);

}

wordRequest();