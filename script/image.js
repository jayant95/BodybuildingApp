$(document).ready(function(){
  $('.progress-pic').click(function() {
    $('#imgModal').css({ display: "block" });
    $('#modal-progressImg').attr("src", $(this).attr('src'));
	});

  $('.close').first().click(function() {
    $('#imgModal').css({ display: "none" });
  })
});
