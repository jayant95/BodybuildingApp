var muscleGroup, bodybuilder;

$(document).ready(function(){
	$(".pin-muscle-group").click(function(e){
		e.preventDefault();
		$(".pin-muscle-group.active").removeClass('active');
    	$(this).addClass('active');
    	muscleGroup = $(this).attr('id');
			$('.bodypart-hidden-input').val(muscleGroup);
	});

	$(".bodybuilder").click(function(e){
		e.preventDefault();
		$(".bodybuilder.active").removeClass('active');
    $(this).addClass('active');
		bodybuilder = $(this).attr('id');
		$('.bodybuilder-hidden-input').val(bodybuilder);
		// if ($(".bodybuilder-hidden-input").hasClass('active')) {
		// 	$('.bodybuilder-hidden-input.active').removeClass('active');
		// 	$(this).removeAttr('name');
		// }
		//
		// $(this).find(".bodybuilder-hidden-input").addClass('active');
		// $(this).find(".bodybuilder-hidden-input.active").attr('name', 'bodybuilder');
	});



	// $(".submit").click(function(e){
	// 	e.preventDefault();
	//
	// 	$.ajax({
	// 		type: "POST",
	// 		url: "pinBodyPartForm.php",
	// 		data: {}
	// 	})
	// });

	function validation() {
		var muscleGroup = $(".pin-muscle-group.active").attr('id');
		var bodybuilder = $(".bodybuilder.active").attr('id');
	}
});
