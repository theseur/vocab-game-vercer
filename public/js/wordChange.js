let megoldasVar=-1;

export function megoldas()
{
  return megoldasVar;
}



export function wordRequest()
{
    fetch('/api/szoszedet')
.then(response => response.json())
.then(data => 
    {
        //console.log(data );
       let x= Math.floor(Math.random()*5);
       megoldasVar=x;
      
        $("#white-flag div").html(data[x].angol);


        $( ".ladder div" ).each(function( index ) {
          //  console.log( index + ": " + $( this ).text() );
            $( this ).text(data[index].magyar) ;
          });
       
        
    }

);

}

wordRequest();