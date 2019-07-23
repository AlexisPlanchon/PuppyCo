$(document).ready(function () {
// this is the id of the form
$("#login_button").click(function(){
	var email = 'antoinehisette@gmail.com';
     console.log("button ajax");
    $.ajax({
       url : 'REST/login/',
       type : 'POST', // Le type de la requête HTTP, ici devenu POST
       data : 'email=' + email, // On fait passer nos variables, exactement comme en GET, au script more_com.php
       dataType : 'html'
    });
   
});

});