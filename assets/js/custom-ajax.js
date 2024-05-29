const base_path = window.location.origin+'/examlogin/';

$(document).ready(function(){
	$("#submit_test_form").hide();
	$(".show_question").hide();
	$(".log_count").hide();
	
	//$(".pre-start-test").hide();
	
	// function preventBack(){window.history.forward();}
		// setTimeout("preventBack()", 0);
		// window.onunload=function(){null};
				
				
	$(document).keydown(function (e) {

		return (e.which || e.keyCode) != 116;
	
	});
	
	document.addEventListener('contextmenu', event => event.preventDefault());
	
	
	$(document).keydown(function (e) {
		return (e.which || e.keyCode) != 27;
	});
	

	// var base_path = "http://103.154.75.252/examlogin/";
	
    $( ".back" ).click(function(e) {
        e.preventDefault();
		var next_quest_id = $(this).attr('id');
		var user_quest_id = $(this.form).attr('id');
		var back_quest_id = $(this.form).find('input.back').attr('id');
		var quest_number  = $(this.form).find('input.counter').attr('id');

		var url = base_path + 'Test/next_question';
		
		$.ajax({
			type: 'POST',
			url: url,
			data: { user_quest: user_quest_id, user_quest_number: quest_number,next_quest:next_quest_id,back_quest:back_quest_id},
			success: function(response) {
				$(".normal").hide(); 
				$(".grid").show();
				document.getElementById("grid_quest").innerHTML = response;
			}
		}); 
    });
	
	
	$('.g_quest').click(function(e) {
		e.preventDefault();
		var quest_number = $(this).html();
		var ids = $(this).attr('id');
		var result = ids.split("/");
		var back_quest_id = result[1];
		var user_quest_id = result[0];
		var next_quest_id = result[2];
		
		var url = base_path + 'Test/user_grid';

		$.ajax({
			type: 'POST',
			url: url,
			data: { user_quest: user_quest_id, user_quest_number: quest_number,next_quest:next_quest_id,back_quest:back_quest_id},
			success: function(response) {
				// alert(response);
				$(".normal").hide(); 
				$(".grid").show();
				document.getElementById("grid_quest").innerHTML = response;
				 // $(".shuffle").shuffleChildren();
			}
		}); 
			
	});	
	
});

$("document").ready(function() {
	
    setTimeout(function() {
        $(".test-counting li a:first").trigger('click');
    },10);
	
});

$(document).on("click",".next",function(e){
	e.preventDefault();	
	var user_quest_answer = $("input[name='answer']:checked").val();
	var quest_number = $(".nextcounter").attr('id');
	var next_quest_id = $(".next").attr('id');
	var back_quest_id = $(".back").attr('id');
	var user_quest_id = $(this.form).attr('id');
	
	var ad = $( "#"+user_quest_id ).serializeArray();
	$.each(ad, function(i, field){
		
		if(field.name == 'answer'){
			var quest = parseInt(quest_number) - 1;
			
			var $results = $('.card-body').find('*').filter(function() {
				// alert(quest);
				return $(this).text() == quest;
			});

			$results.css('background-color', '#007A56');
			$results.addClass("selected");
			$('#li'+user_quest_id).css({ 'background-color' : ''});
			// $('#li'+user_quest_id).removeClass("green");
		}
     
    });
	
	
	// var url = 'http://103.154.75.252/examlogin/Test/next_question';	
	var url = base_path + 'Test/next_question';
	
	$.ajax({
		type: 'POST',
		url: url,
		data: { user_quest: user_quest_id, user_quest_number: quest_number,next_quest:next_quest_id,back_quest:back_quest_id,user_quest_answer:user_quest_answer},
		success: function(response) {
			
			document.getElementById("grid_quest").innerHTML = response;
		}
	});  
 });
 
 
 
 
 $(document).on("click",".back",function(e){
	e.preventDefault();
	var user_quest_answer = $("input[name='answer']:checked").val();
	var quest_number = $(".backcounter").attr('id');
	var next_quest_id = $(this.form).attr('id');
	var back_quest_id = $(".back").attr('id');
	var user_quest_id = $(this.form).attr('id');
	
	var ad = $( "#"+user_quest_id ).serializeArray();
	$.each(ad, function(i, field){
		
		if(field.name == 'answer'){
			var quest = parseInt(quest_number) + 1;
			
			var $results = $('.card-body').find('*').filter(function() {
				return $(this).text() == quest;
			});

			$results.css('background-color', '#007A56');
			$results.addClass("selected");
						
			$('#li'+user_quest_id).css({ 'background-color' : ''});
			
			
		}
     
    });
	
	
	// var url = 'http://103.154.75.252/examlogin/Test/back_question';
	var url = base_path + 'Test/back_question';
	
	$.ajax({
		type: 'POST',
		url: url,
		data: { user_quest: user_quest_id, user_quest_number: quest_number,next_quest:next_quest_id,back_quest:back_quest_id,user_quest_answer:user_quest_answer},
		success: function(response) {
			document.getElementById("grid_quest").innerHTML = response;
		}
	}); 
 });
 
 
 $(document).on("click",".reset",function(e){
	e.preventDefault();	
	var user_quest_answer = $("input[name='answer']:checked").val();
	var user_quest_id = $(this.form).attr('id');
	var quest_number = $(".backcounter").attr('id');
	var ad = $( "#"+user_quest_id ).serializeArray();
	
	$.each(ad, function(i, field){
		
		if(field.name == 'answer'){

			$(':radio').each(function () {
				$(this).removeAttr('checked');
				var user_quest_answer = $('input[type="radio"]').prop('checked', false);
			});
			
			var quest = parseInt(quest_number) + 1;
			
			var $results = $('.card-body').find('*').filter(function() {
				return $(this).text() == quest;
			});
	
		$('#li'+user_quest_id).removeClass("selected");
		$('#li'+user_quest_id).css({ 'background-color' : ''});
		$results.css('background-color', '');
		$('#li'+user_quest_id).removeClass("green");
		}
    });
	

	// var url = 'http://103.154.75.252/examlogin/Test/reset_answer';
	var url = base_path + 'Test/reset_answer';
	
	
	$.ajax({
			type: 'POST',
			url: url,
			data: { user_quest: user_quest_id,user_quest_answer:''},
			success: function(response) {
				return false;
			}
	});
	
 });
 
 
  $(document).on("click",".submit",function(e){
	e.preventDefault();
	var user_quest_answer = $("input[name='answer']:checked").val();
	var quest_number = $(".backcounter").attr('id');
	var next_quest_id = $(this.form).attr('id');
	var back_quest_id = $(".back").attr('id');
	var user_quest_id = $(this.form).attr('id');
	
	var ad = $( "#"+user_quest_id ).serializeArray();
	$.each(ad, function(i, field){
		
		if(field.name == 'answer'){
			var quest = parseInt(quest_number) + 1;
			var $results = $('.card-body').find('*').filter(function() {
				return $(this).text() == quest;
			});

			$results.css('background-color', '#007A56');
			$results.addClass("selected");
		}
     
    });
	
	
	
	// var url = 'http://103.154.75.252/examlogin/Test/submit_question';
	var url = base_path + 'Test/submit_question';
	
	$.ajax({
		type: 'POST',
		url: url,
		data: { user_quest: user_quest_id, user_quest_number: quest_number,next_quest:next_quest_id,back_quest:back_quest_id,user_quest_answer:user_quest_answer},
		success: function(response) {
			
			$(".test-aside").hide(); 
			
			$(".grid").css("flex","0 0 100%");
			$(".grid").css("max-width","100%");
			document.getElementById("grid_quest").innerHTML = response;
		}
	}); 
 });

$(document).on("click",".attempt_notattempt",function(e){
	e.preventDefault();

	var ids = $(this).attr('id');
	var result = ids.split("/");
	var user_quest_answer = result[1];
	var user_quest_id = result[0];
	var quest_number = result[2];
	
	
	// var url = 'http://103.154.75.252/examlogin/Test/attempt_notattemptlink';
	var url = base_path + 'Test/attempt_notattemptlink';

	$.ajax({
		type: 'POST',
		url: url,
		data: { user_quest: user_quest_id, user_quest_answer:user_quest_answer, user_quest_number: quest_number},
		success: function(response) {
			$(".test-aside").show();
			$(".grid").css("flex","");
			$(".grid").css("max-width","");
		
			document.getElementById("grid_quest").innerHTML = response;
		}
	});  
			
});	

$(document).on("click","#agree",function(){
	// e.preventDefault();

	if($(this). prop("checked") == true){
		// $('.agree').prop('checked', true);
		$("#submit_test").show();
		
	}else{
		$("#submit_test").hide();
	}
			
});	


$(document).ready( function () { 
		// $(".belowtestbutton").hide();
		
	// document.addEventListener('contextmenu', event => event.preventDefault());	
		
	/* Get into full screen */
	function GoInFullscreen(element) {
		if(element.requestFullscreen)
			element.requestFullscreen();
		else if(element.mozRequestFullScreen)
			element.mozRequestFullScreen();
		else if(element.webkitRequestFullscreen)
			element.webkitRequestFullscreen();
		else if(element.msRequestFullscreen)
			element.msRequestFullscreen();
	} 
	
	/* Get out of full screen */
	function GoOutFullscreen() {
		if(document.exitFullscreen)
			document.exitFullscreen();
		else if(document.mozCancelFullScreen)
			document.mozCancelFullScreen();
		else if(document.webkitExitFullscreen)
			document.webkitExitFullscreen();
		else if(document.msExitFullscreen)
			document.msExitFullscreen();
	} 
	
	
	/* Is currently in full screen or not */
	function IsFullScreenCurrently() {
		var full_screen_element = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || null;
		
		// If no element is in full-screen
		if(full_screen_element === null)
			return false;
		else
			return true;
	} 
	
	
	$(".e_start").on('click', function() {
	// $(".e_start").on('click', function() {
		$(".show_question").show();
		$(".log_count").show();
		
		$(".pre-start-test").hide();
		
		
		
		var count = $('#time_left1').val();
		// alert(count);
		// var count = 1000;
		var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

		function timer() {
			
			count = count - 1;
			if (count < 0) {
				setTimeout(function() {	$("#submit_test").trigger('click');},1000);
				clearInterval(counter);
				return;
			}

			var seconds = count % 60;
			var minutes = Math.floor(count / 60);
			var hours = Math.floor(minutes / 60);
			minutes %= 60;
			hours %= 60;
		
			if(count === 1800){
				
				
				// $('#exampleModal').show().delay(5000).fadeOut();
				$("#timeleft1").hide();
				$("#timeleft2").hide();
				document.getElementById("timeleft").innerHTML = "<b style=color:#ca1717;>30 minutes left</b>";
				$("#timeleft").show().delay(5000).fadeOut();
			} else if(count === 1200){
				$("#timeleft").hide();
				$("#timeleft2").hide();
				document.getElementById("timeleft1").innerHTML = "<b style=color:#ca1717;>20 minutes left</b>";
				$("#timeleft1").show().delay(5000).fadeOut();
			}else if(count === 600){
				$("#timeleft").hide();
				$("#timeleft1").hide();
				document.getElementById("timeleft2").innerHTML = "<b style=color:#ca1717;>10 minutes left</b>";
				$("#timeleft2").show().delay(5000).fadeOut();
			}
			
			// else if(count < 6){
				// setInterval(blink_text, 1000);
			// }

			document.getElementById("timer").innerHTML = "<span><strong>" + hours + "H</strong><strong> " + ": " +minutes + " M</strong><strong> " + " : " + seconds + " S</strong>" + "</span>" + "<b style=color:#ca1717;>शेष समय  /  Time left </b>";
			
		
			
		}
		
		function blink_text() {
			$('#timer').fadeOut(500).css('color', 'transparent');
			$('#timer').fadeIn(500).css('color', 'red');
		}
		
		
		
		
		if(IsFullScreenCurrently())
			GoOutFullscreen();
		else
			GoInFullscreen($("#element").get(0));
			
	});
 
}); 





