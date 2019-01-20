var muscleGroup, bodybuilder;

$(document).ready(function(){
	$(".pin-muscle-group").click(function(e){
		e.preventDefault();
		$(".pin-muscle-group.active").removeClass('active');
    	$(this).addClass('active');
    	muscleGroup = $(this).attr('id');
	});

	$(".bodybuilder").click(function(e){
		e.preventDefault();
		$(".bodybuilder.active").removeClass('active');
    	$(this).addClass('active');
		bodybuilder = $(this).attr('id');
	});

	$(".submit").click(function(e){
		e.preventDefault();
		alert(muscleGroup);

		$.ajax({
			type: "POST",
			url: "pinBodyPartForm.php",
			data: {}
		})

		// $("#pinBodyPart").submit();
		// $.ajax({
		// 	type: 'post',
		// 	url: 'pinBodyPartForm.php',
		// 	data: $('form').serialize(),
		// 	success: function () {
		// 		alert('form submitted');
		// 	}

		// if (validation()) {
			
		// 	return true;
		// }
	});

	function validation() {
		var muscleGroup = $(".pin-muscle-group.active").attr('id');
		var bodybuilder = $(".bodybuilder.active").attr('id');
	}
});