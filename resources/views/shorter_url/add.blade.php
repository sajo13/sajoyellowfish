@extends('layouts.app')     
 @section('content')

<form id="submit">
@csrf
<label>Title<input type="text" name="title" required autocomplete="off" id="title"></label>
<label> URL<input type="text" name="url" required autocomplete="off" id="url"></label>

<button type="submit"> Create Url</button> 
</form>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<script type="text/javascript">

$('#submit').on( 'submit', function(e) {
e.preventDefault();
var title = $(this).find('input[name=title]').val();
var url=$(this).find('input[name=url]').val();

$.ajax({
url: "/generate-shorten-link",
type:"POST",
data:{
"_token": "{{ csrf_token() }}",
title:title,
url:url,
},
success:function(response){
console.log(response);
window.location.href = "generate-shorten-link";

},

});
});
</script>

 @endsection