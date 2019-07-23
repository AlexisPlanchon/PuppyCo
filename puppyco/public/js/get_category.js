$(document).ready(function () {
$.ajax({ 
type: "GET",
data: {id:1123},
url: "http://127.0.0.1/puppyco/cities",
success: function(data){        
 alert(data);
}
	
});