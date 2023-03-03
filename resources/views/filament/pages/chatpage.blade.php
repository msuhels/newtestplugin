<x-filament::page>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--   @vite('resources/css/app.css')
 -->  <style>

</style>

</head>

<body>
  <ul class="sidenav" >
  @foreach($Data["user"] as $user)
    <li ><a href="{{ route('filament.pages.chatpage',['id'=> $user->id ] ) }}">{{ $user->name }}</a>         
  @endforeach
  </ul>
  
@if(!request()->get('id'))
  <div class="main "><h1><b>Welcome to the chat</b></h1></div>
@else

<div class="main">
       <h2 style='font-size:25px; text-align:center '><b> {{ $Data["selecteduser"]->name }}</b></h2>
  <div class="card">
    @foreach($Data["chatMessages"] as $chatMessages) 
    
   @if($chatMessages->sender_id == Auth::user()->id)
   <div class='sender'>
      <p>{{ $chatMessages->message }}</p>
   </div>
   @else
   <div class='reciever'>
      <p>{{ $chatMessages->message }}</p>
   </div> 
   @endif   
    @endforeach
       <div id='test'>
      
      </div>
  </div>
  <div class="card2">
    <div>
<!--     <form action="{{ route('filament.createchat') }}" method='POST'>
 --> 
    <form id='form'>   
      <input type="hidden" name='reciever_id' id='reciever_id' value="{{ request()->get('id') }}">
      <input type="text" name='message'  placeholder='type message' id='message'>
      <button type='submit' id='submitform'>send</button>
    </form>


<!--           <button id='click'>send</button>
 -->
  </div>
  </div>
</div>  
@endif
</body>
</html>
</x-filament::page>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
$(document).ready(function () {
  $("form").submit(function (e) {
     e.preventDefault();

    var formData = {
      reciever_id: $("#reciever_id").val(),
      message: $("#message").val(),
    };

     var url = "{{ route('filament.createchat') }}";
    $.ajax({
      type: "POST",
      url: url,
      headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
         if(data.msg == 'success'){
             if(data.chatMessages.sender_id == data.userId){
                 // $('#sender').append(data.chatMessages.message)
                 $("#test").append(" <p class='sender'>Newly added appended text</p>."); 
                 $("#test").animate({
                      scrollBottom:  scrolled
                 }); 
                 
             }else{
                 $('#reciever').append(data.chatMessages.message)
             }
         }
        $("#message").val('');

    });

  });
});
</script>