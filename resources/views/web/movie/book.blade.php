@extends('web.components.app')
@extends('web.components.uppermenu')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
  .messagePanel { border: solid 1px black; width: 320px; height: 330px; }

.seat {
    
    width: 20px;
    height: 20px;
    margin: 5px;
    border: solid 1px black;
    float: left;
    
    
}

.clearfix { clear: both;}
.available {
    background-color: #96c131;
}

.hovering{
	background-color: #ae59b3;
}
.selected{
    background-color: red;
}

</style>
<div id="messagePanel" class="messagePanel"></div>
<script>
  $(()=>{
    createseating()
  })
//Note:In js the outer loop runs first then the inner loop runs completely so it goes o.l. then i.l. i.l .i.l .i.l. i.l etc and repeat

function createseating(){

 var seatingValue = [];
 for ( var i = 0; i < 10; i++){
   
    for (var j=0; j<10; j++){
        var seatingStyle = "<div class='seat available'></div>";
        seatingValue.push(seatingStyle);

         if ( j === 9){
        console.log("hi");
         var seatingStyle = "<div class='clearfix'></div>";
        seatingValue.push(seatingStyle);   



     }
  }   
}

$('#messagePanel').html(seatingValue);

       $(function(){
            $('.seat').on('click',function(){ 


              if($(this).hasClass( "selected" )){
                $( this ).removeClass( "selected" );                  
              }else{                   
                $( this ).addClass( "selected" );
              }

            });

            $('.seat').mouseenter(function(){     
                $( this ).addClass( "hovering" );

                   $('.seat').mouseleave(function(){ 
                   $( this ).removeClass( "hovering" );
                      
                   });
            });


       });

};
</script>
@endsection