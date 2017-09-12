$(document).ready(function() {


     $("#messageCheck").click(function() {
        $("#notify").css({"visibility":"hidden"});
		 $.post(
				'submitevent.php',
				{ 
					regnumber : $("#regnumber").val()
				},
				function(data){
					//alert(data);
			});
	 });
});