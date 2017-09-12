var i=0;
$(document).ready(function(){
 	var count=$(".wrapper_2 #content_area .slide").length;
   	$("#right_nav").click(function(){
   		i++;
   		if(i>count-1)
   		{
   			i=count-1;
   		}
         else{
   		$(".wrapper_2 #content_area .slide").hide("slide",{direction:'left'},300).delay(300);
   		$(".wrapper_2 #content_area .slide").eq(i).show("slide",{direction:'right'},300);}
   		
   	});

	$("#left_nav").click(function(){
		--i;
		if(i<0)
   		{
   			i=0;
   		}
         else{
   		$(".wrapper_2 #content_area .slide").hide("slide",{direction:'right'},300).delay(300);
   		$(".wrapper_2 #content_area .slide").eq(i).show("slide",{direction:'left'},300);}
   	});  
});