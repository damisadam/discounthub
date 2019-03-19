
$(document).ready(function(){
    $("#send").change(function()
    {
	var city = jQuery('#send').val();
     $.ajax({
         type: "POST",
         url: "http://localhost/admin/include/ajax.php?city="+city,

         cache:false,
         success: 
              function(data){
				 
                jQuery('#city').val(data);  //as a debugging message.
              }
          });// you have missed this bracket
 });
 });

