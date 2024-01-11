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
<h2>Movie name:{{$movie_data}}</h2>
  <form action="" name="ticket_movie_frm" id="ticket_movie_frm" method="post">
    <div id="messagePanel" class="messagePanel"></div>
    @csrf
    <input type="hidden" name="movie_id" id="movie_id" value="{{$movie_id}}">
    <input type="hidden" name="ticket_detail" id="ticket_detail">
    <input type="button" class="btn btn-primary frm_btn_submit" value="Submit">
  </form>
<script>
  $(()=>{
    createseating()
  })
//Note:In js the outer loop runs first then the inner loop runs completely so it goes o.l. then i.l. i.l .i.l .i.l. i.l etc and repeat
var seat_no = [];

$('.frm_btn_submit').click(()=>{
  $('#ticket_detail').val(seat_no.join(','))
  $('#ticket_movie_frm').submit()
})

function createseating(){

 var seatingValue = [];
 var seat_num = ''
 for ( var i = 0; i < 10; i++){
    for (var j=0; j<10; j++){
        var seatingStyle = `
        <div class='seat available' data-id="${j+1}_${i+1}">
        </div>`;
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
              
              seat_no.push($(this).data('id'))
              console.log(seat_no)
              if($(this).hasClass("selected")){
                $(this).removeClass( "selected")
              }else{
                $(this).addClass( "selected")
              }

            })

            $('.seat').mouseenter(function(){
                $(this).addClass("hovering")
                   $('.seat').mouseleave(function(){
                   $(this).removeClass("hovering")
                })
            })
       });

};
</script>
@endsection