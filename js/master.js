$(function(){
	//console.log('hi');
	//$('#hi').click(function(){console.log('hi');});
	//$('.button').click(function(){console.log('hey');});
	$('#fail3, #fail4, #fail5, #fail6, #fail7').click(function(evt){
		alert('This is currently not Avalible. Sorry for the inconvenience.');
	});

	$(window).ready(function(){
		$('ol li').addClass('default');
	});

	$('ol li:first-child').hover(
		function(){
			///console.log('hi');
			$('ol li:first-child').removeClass('default'); 
			$('ol li:first-child').addClass('big');
		},

		function(){
			$('ol li:first-child').removeClass('big');
			$('ol li:first-child').addClass('default');
		}
	);

	/*$('.menu').toggle(
		function(){
			$('.button-group').css('display','block');
		},

		function(){
			$('.button-group').css('display','none');
		}
	);*/ //Fail...due to time...

});