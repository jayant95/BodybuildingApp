$(document).ready(function(){
	$(".pin-muscle-group").click(function(e){
		e.preventDefault();
		$(".pin-muscle-group.active").removeClass('active');
    	$(this).addClass('active');
	});

	$(".bodybuilder").click(function(e){
		e.preventDefault();
		$(".bodybuilder.active").removeClass('active');
    	$(this).addClass('active');
	});

	$(".submit").click(function(e){
		e.preventDefault();
		var muscleGroup = $(".pin-muscle-group.active").attr('id');
		var bodybuilder = $(".bodybuilder.active").attr('id');

		$("#pinBodyPart").submit();
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