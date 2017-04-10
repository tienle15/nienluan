
// datepicker
	$(function () {
	  $("#datepicker").datepicker({ 
	        autoclose: true, 
	        todayHighlight: true
	  }).datepicker('update', new Date());
	});
	$(function () {
	  $("#datepicker2").datepicker({ 
	        autoclose: true, 
	        todayHighlight: true
	  }).datepicker('update', new Date());
	});


// sideshow  
    $('#myCarousel').carousel({ 
        interval:   4000    
    });