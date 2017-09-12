var flag= 0;

$(document).ready(function(){
	
	$("#layer").hide();
	$("#add-item-box-event").hide();
	$("#add-item-box-portfolio").hide();
	$("#add-item-box-skilljar").hide();
	$("#tags-outer-box").hide();
	$("#profile-details").hide();
    $("#most_outer").hide();
 

	//tooltip fixes
	$( ".upvote" ).tooltip({ position: { my: "left+15 center", at: "right center" } });
	$( ".downvote" ).tooltip({ position: { my: "left+15 center", at: "right center" } });
	

	//tutorial
	$("#help").click(function(){
		$("#tutorial").show("fadeIn");
		$("#layer").show();
		$("body").css({'overflowY':'hidden'});
	});

	 $(".close_tutor").click(function(){
      $("#tutorial").hide("fadeOut");
      $("#layer").hide();
      $("body").css({'overflowY':'scroll'});
   });

	//for the close class
	$(".close").click(function(){
		$("#layer").hide();
		$("#add-item-box-event").slideUp();
		$("#add-item-box-portfolio").slideUp();
		$("#add-item-box-skilljar").slideUp();
		$("#profile-details").slideUp();
		$("#dp-box").slideUp();
		$("#most_outer").slideUp();

		
		window.location.reload();
		//ans=confirm("Want to reload?");
		//if (ans==true)
		//window.setTimeout(function (){window.location.reload(); }, 1000);
		
	});

	$("#h_pin").click(function() {
	    $('#h_gig').css("background-color","");
	    $('#h_event').css("background-color","");
	    $(this).css({"background-color":"#C0C0C0"});
	});
	$("#h_gig").click(function() {
	     $('#h_pin').css("background-color","");
	    $('#h_event').css("background-color","");
	    $(this).css({"background-color":"#C0C0C0"});
	});
	$("#h_event").click(function() {
	    $('#h_gig').css("background-color","");
	    $('#h_pin').css("background-color","");
	    $(this).css({"background-color":"#C0C0C0"});
	});

	//ADDING A NEW EVENT
	$("#add-button-event").click(function(e){
		$("#layer").show();	
		var x = e.pageX;
    	var y = e.pageY-200;
    	//alert(x +', '+ y);
    	$("#add-item-box-event").css({"top":y, "left":x-390, "position":"absolute"});
    	//$(this).unbind('click');
		$("#add-item-box-event").slideDown();
	});
		
	$('#add-new-event').click(function(){
		if($("#new-event").val() != "" || $("#new-event").val() != null) {
			$.post(
			'submitevent.php',
			{ 
				eventdata : $("#new-event").val(),
				posttags : $("#post-tags-events").val()				
			},
			function(data){
				$("#message-event").html(data);
				$('input[name="new-event"]').val("");
			});
		} else {
			$("#message-event").html("Enter all fields.");
		}	
	});


	//Status bar-new
  $("#add-post").click(function() {
          $(this).animate({"height": "60px","border-bottom-left-radius":"0px","border-bottom-right-radius":"0px"}, "fast" );
		  $("#hidden_post").css({"border-bottom-right-radius":"5px","border-bottom-left-radius":"5px"});
            $("#hidden_post").slideDown("fast");
            $("#add-post").css("border","1px solid #C8C8C8");
	    $(this).addClass("transition1");
	    $("#hidden_post").addClass("transition2");
            $("#add-post").css("border-bottom","none");		
$('#h_pin').click();			
 //$("#outer_hidden").addClass("onclick_status");
  });
	

	//ADDING A NEW PORTFOLIO
	$("#add-button-portfolio").click(function(e){
		$("#layer").show();	
		var x = e.pageX;
    	var y = e.pageY-200;
    	$("#add-item-box-portfolio").css({"top":y, "left":x-390, "position":"absolute"});
		$("#add-item-box-portfolio").slideDown();
	});
		
	$('#add-new-portfolio').click(function(){
		if($("#new-portfolio").val() != "" || $("#new-portfolio").val() != null) {
			$.post(
			'submitevent.php',
			{ 
				portfoliodata : $("#new-portfolio").val(),
				posttags : $("#post-tags-portfolio").val()
			},
			function(data){
				$("#message-portfolio").html(data);
				$('input[name="new-portfolio"]').val("");
			});
		} else {
			$("#message-portfolio").html("Enter all fields.");
		}	
	});	



	//ADDING A NEW SKILLJAR
	$("#add-button-skilljar").click(function(e){
                 	$("#layer").show();	
    	$("#add-item-box-skilljar").css({"top":270, "left":400, "position":"absolute"});
		$("#add-item-box-skilljar").slideDown();
	});
		
	$('#add-new-skilljar').click(function(){
	$.post('submitevent.php',{ skilljardata : $("#new-skilljar").val() },function(data){
		$("#message-skilljar").html(data);
		$('input[name="new-skilljar"]').val("");
	});
	});

        $('#add-new-skilljarMember').click(function(){
	$.post('submitevent.php',{ skilljardataMember : $("#new-skilljar").val() },function(data){
		$("#message-skilljar").html(data);
		$('input[name="new-skilljar"]').val("");
	});
	});



	  // Live Search for Skills
        $(function() {
        $('.new-skilljar').click(function() {
		$("#layer").show();	
		$("#most_outer").css({"top":350, "left":410, "position":"absolute"});
	        $("#add-item-box-skilljar").animate({height:'400',width:'800'});
		$("#most_outer").slideDown();
        });
        });
		
	$(function () {
        $("#new-skilljar").keyup(function () {
                var filter = $(this).val(),
                count = 0;
                $("#menu-list li").each(function () {
                    if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                      $(this).fadeOut();
                    } else {
                      $(this).show();
                      count++;
                    }
         });
          if (count > 0) {
              $("#filter-count").text("Most relevant results("+count+") for: " + filter);
            } else {
                 $("#filter-count").text("No results for: '" + filter +"' Want to add this Skill to your Skilljar..go for 'Add Skill'  ");
            }
          if (filter == "") {
              $("#filter-count").text("")
            }
        });
        });

        $("#inner a").click(function(){
              var value = $(this).html();
              var input = $('#new-skilljar');
              input.val(value);
		$('#most_outer').fadeOut();
	    $('#add-item-box-skilljar').animate({height:'200',width:'460'});

        });
		//Live Search for Skills
	


	//DP upload
	$("#dp-upload").hide("slide");
	$("#dp-box").hide("slide");
	$("#dp").hover(function(){
		$("#dp-upload").fadeIn(300);
	});

	$("#dp-upload").click(function(e){
		$("#layer").show();	
		var x = e.pageX;
    	var y = e.pageY-200;
    	$("#dp-box").css({"top":y, "left":x, "position":"absolute"});
		$("#dp-box").slideDown();
	});


	//Adding a new post
	$("#h_pin").click(function(){
		$("#add-post-type").val("pin");
		 $("#h_pin").css({"bacground-color":"red"});
	});
	$("#h_gig").click(function(){
		$("#add-post-type").val("gigs");
		$("#type-post").html("[Posting as Gigs]");
	});
	$("#h_event").click(function(){
		$("#add-post-type").val("event_post");
		$("#type-post").html("[Posting as an Event. Include Venue and Time]");
	});


	$("#add-post-button").click(function(){
		if($("#add-post").val() == "" || $("#add-post").val() == null) {
			$("#posted").html("C'mon, you can't put an empty status :P").show().fadeOut(3500);
		} else if($("#add-post-type").val() == "" || $("#add-post-type").val() == null) {
			$("#posted").html("Please select some Skills to tag your post").show().fadeOut(3500);
		} else if($("#post-tags").val() == "" || $("#post-tags").val() == null) {
			$("#posted").html("Please select some Skills").show().fadeOut(3500);
		} else {
			$.post(
				'submitevent.php',
				{ 
					postdata : $("#add-post").val(),
					datatype : $("#add-post-type").val(),
					posttags : $("#post-tags").val()
				},
				function(data){
					$("#posted").html(data).show().fadeOut(5000);
					$('input[name="add-post-type"]').val("");
					$('input[name="add-post"]').val("");
					$('input[name="post-tags"]').val("");
					$("#post-tags-display").html("");
					$("#type-post").html("");
				}
			);
		}
	});




	//tags

	$(".close2").click(function(){
		$("#tags-outer-box").slideUp();
		$("#post-tags-display").html("Skills : ");
		$("#post-tags").val("");
		$('input[name="three-tags"]:checked').each(function() {
			$("#post-tags").val($("#post-tags").val()+this.value+"|");
			$("#post-tags-display").html($("#post-tags-display").html()+" ["+this.value+"]")
		});
		$("#layer").hide();
	});
		$("#close11").click(function(){
		$("#tags-outer-box").slideUp();
		$("#post-tags-display").html("Skills : ");
		$("#post-tags").val("");
		$('input[name="three-tags"]:checked').each(function() {
			$("#post-tags").val($("#post-tags").val()+this.value+"|");
			$("#post-tags-display").html($("#post-tags-display").html()+" ["+this.value+"]")
		});
		$("#layer").hide();
	});

	$("#hidden-add-tag-button").click(function(e){
		$("#layer").show();	
		var x = e.pageX+30;
    	var y = 0;
    	$("#tags-outer-box").css({"top":0, "left":0, "position":"absolute"});
		$("#tags-outer-box").slideDown();
	});
	


	$("#tags-outer-box3").hide();
	$("#close13").click(function(){
		$("#tags-outer-box3").slideUp();
		$("#post-tags-display-").html("Skills : ");
		$("#post-tags-events").val("");
		$("#post-tags-portfolio").val("");
		$('input[name="three-tags3"]:checked').each(function() {
			$("#post-tags-events").val($("#post-tags-events").val()+this.value+"|");
			$("#post-tags-portfolio").val($("#post-tags-portfolio").val()+this.value+"|");
			$("#post-tags-display-").html($("#post-tags-display-").html()+" ["+this.value+"]")
		});
	});


	$("#tags-outer-box3").hide();
	$(".close3").click(function(){
		$("#tags-outer-box3").slideUp();
		$("#post-tags-display-").html("Skills : ");
		$("#post-tags-events").val("");
		$("#post-tags-portfolio").val("");
		$('input[name="three-tags3"]:checked').each(function() {
			$("#post-tags-events").val($("#post-tags-events").val()+this.value+"|");
			$("#post-tags-portfolio").val($("#post-tags-portfolio").val()+this.value+"|");
			$("#post-tags-display-").html($("#post-tags-display-").html()+" ["+this.value+"]")
		});
	});

	$("#add-tag-button-portfolio").click(function(e){
		$("#tags-outer-box3").css({"top":0, "left":0, "position":"absolute"});
		$("#tags-outer-box3").slideDown();
	});

	$("#add-tag-button-event").click(function(e){
		$("#tags-outer-box3").css({"top":0, "left":0, "position":"absolute"});
		$("#tags-outer-box3").slideDown();
	});



	$("#profile-details-icon img").click(function(e){
		$("#layer").show();	
		var x = e.pageX-200;
    	var y = e.pageY+50;
    	//alert(x +', '+ y);
    	$("#profile-details").css({"top":y-10, "left":x-200, "position":"absolute"});
    	//$(this).unbind('click');
		$("#profile-details").slideDown();
	});

	$("#profile-details-li").click(function(e){
		$("#layer").show();	
		var x = e.pageX-200;
    	var y = e.pageY+50;
    	//alert(x +', '+ y);
    	$("#profile-details").css({"top":y, "left":x, "position":"absolute"});

		$("#profile-details").show("slide");
	});

	$("#update-profile").click(function(){
		$.post(
			'submitevent.php',
			{ 
				email : $("#email").val(),
				phone : $("#phone").val(),
				website : $("#website").val(),
				about : $("#about").val(),
			},
			function(data){
				$("#message-update-profile").html(data);
			}
		);
	});


	$('#add-new-regno').click(function(){
		$.post(
			'submitevent.php',
			{ 
				addregno : $("#new-regno").val(),
			},
			function(data){
				$("#message-event").html(data);
				$('input[name="new-regno"]').val("");
			});
	});

var limit = 3;
$('input.three-tags').on('change', function(evt) {
   if($(this).siblings(':checked').length >= limit) {
       this.checked = false;
   }
});



	//Search starts

	$("#search_pin").click(function(){
		$("#search-categ").val("pin");
		$("#type-search").html("[Search Category : Pins]");
	});
	$("#search_gig").click(function(){
		$("#search-categ").val("gig");
		$("#type-search").html("[Search Category : gigs]");
	});
	$("#search_event").click(function(){
		$("#search-categ").val("event");
		$("#type-search").html("[Search Category : Events]");
	});
	$("#search_club").click(function(){
		$("#search-categ").val("club");
		$("#type-search").html("[Search Category : Clubs]");
	});
	$("#search_skill").click(function(){
		$("#search-categ").val("skill");
		$("#type-search").html("[Search Category : People]");
	});


	$('#search-btn').click(function(){
		if($("#query").val() == "" || $("#query").val() == null) {
			$("#type-search").html("Error : Empty query!");
		} else if($("#search-categ").val() == "" || $("#search-categ").val() == null) {
			$("#type-search").html("Please select a search category.");
		} else {
			$("#layer").fadeIn();	
			$.post(
				'submitevent.php',
				{ 
					query : $("#query").val(),
					search_categ : $("#search-categ").val()
				},
				function(data){
					$("#message").html(data);
					$("#message").css({"box-shadow":"0px 4px 6px 1px rgba(50, 50, 50, 0.3)"});
					//$('input[name="new-regno"]').val("");
				});
			$("#layer").fadeOut();
		}			
	});	

	//Search ends


	//message starts

	$('#send-msg').click(function(){
		if($("#msg-text").val() == "" || $("#msg-text").val() == null) {
			$("#error").html("Error : Empty query!");
		} else {
			$("#error").html("Sending message...");	
						$("#loading").show();
			$.post(
				'submitevent.php',
				{ 
					msg  : $("#msg-text").val(),
					to   : $("#to").val(),
					from : $("#from").val()
				},
				function(data){
					//$("#error").html(data);
					//$('input[name="new-regno"]').val("");
					$("#error").html("Message Sent.");
					$("#loading").hide();
					$(".load_status_out").append(data);

				});
		}			
	});

	//message ends


	
		$(".upvote").click(function(){
	 		var v_id = $(this).find("input").attr("value");
	 		var reg_no = $(this).find("input").attr("regno");
	 		var v_field = $(this).find("input").attr("field");
	 		
	 		$.post(
			'submitevent.php',
			{ 
				vid : v_id,
				vfield : v_field,
				regno : reg_no,
				imp : "upvote"
			},
			function(data){
				alert(data);
				window.location.reload();
			});

		});

		$(".downvote").click(function(){
			var v_id = $(this).find("input").attr("value");
	 		var reg_no = $(this).find("input").attr("regno");
	 		var v_field = $(this).find("input").attr("field");
	 		
	 		$.post(
			'submitevent.php',
			{ 
				vid : v_id,
				vfield : v_field,
				regno : reg_no,
				imp : "downvote"
			},
			function(data){
				alert(data);
				window.location.reload();
			});
		});
	

});

$(window).scroll(function () {
    if (window.pageYOffset>=80)
    {
    	if(flag==0)
    	{
    		$('#header').hide();	
    		flag=1;
    	}
    	$('#header').slideDown(200);
        $('#header').addClass('fixed');
    }
    else
    {
    	flag=0;
        $('#header').removeClass('fixed',100,'linear');
        $('#header').slideDown();
    }
});


 $(function() { 

$( document).tooltip({
show: {
        effect: "fadeIn",
        delay: 5,
      },

    hide: {
        effect: "fadeOut",
        delay: 5,
      },
      position: {
        my: "center top+5",
        at: "center bottom"
      },
         
    });
  });


	