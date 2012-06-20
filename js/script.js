// remap jQuery to $
(function($) {

})(this.jQuery);

//map base url
var base_url = $('#baseurl').val();

// usage: log('inside coolFunc',this,arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function() {
	log.history = log.history || []; // store logs to an array for reference
	log.history.push(arguments);
	if (this.console) {
		console.log(Array.prototype.slice.call(arguments));
	}
};

$(document).ready(function() {
	$('.slideshow').cycle({
		speedIn : 2000,
		speedOut : 2000,
		timeout : 10000,
		fx : 'fade' // choose your transition type, ex: fade, scrollUp, shuffle,
					// etc...
	});
	$('.slideshow').css("display", "block");
});

$
		.backstretch("https://s3-eu-west-1.amazonaws.com/grandgardendesigns/background.jpg");

// catch all document.write() calls
(function(doc) {
	var write = doc.write;
	doc.write = function(q) {
		log('document.write(): ', arguments);
		if (/docwriteregexwhitelist/.test(q))
			write.apply(doc, arguments);
	};
})(document);

// wymeditor
jQuery(function() {
	jQuery('.wymeditor').wymeditor();
});

// jquery ui buttons
$(function() {
	$("button, input:submit").button();

});

// date picker on menu page

$(document).ready(
		function() {
			$("#datepicker").datepicker(
					{
						dateFormat : 'DD, d MM, yy',
						onSelect : function(dateText, inst) {
							var epoch = $.datepicker.formatDate('@', $(this)
									.datepicker('getDate')) / 1000;

							$('#alternate').val(epoch);
						}
					});

			$("#datepicker2").datepicker(
					{
						dateFormat : 'DD, d MM, yy',
						onSelect : function(dateText, inst) {
							var epoch = $.datepicker.formatDate('@', $(this)
									.datepicker('getDate')) / 1000;

							$('#alternate2').val(epoch);
						}
					});

		});



/*******************************************************************************
 * /* fix background width /
 ******************************************************************************/
$(document)
		.ready(
				function() {
					var windowwidth = $(window).width(), contenttop = $(
							'#contenttop').offset().top, adjustment = contenttop - 100, filleradjust = contenttop + 200;

					$('#fullbackground img').css("width", windowwidth);
					$('#whitefade').css("top", adjustment);
					$('#whitefadefiller').css("top", filleradjust);
					$('#fullbackground').fadeIn();
				});

$(window).resize(function() {
	var windowwidth = $(window).width();
	$('#fullbackground img').css("width", windowwidth);
});

$(document).ready(function() {

	/***************************************************************************
	 * /* blue button hover /
	 **************************************************************************/
	$(".bluebox").hover(function() {

		$(this).stop().animate({
			backgroundColor : "#51a5fc",
			height : '116px',
			marginBottom : 0,
			marginTop : 0
		}, 150);

		$(this).find('.clickhere').fadeIn(100);
	}, function() {

		$(this).stop().animate({
			backgroundColor : "#077eff",
			height : '100px',
			marginBottom : 8,
			marginTop : 8

		}, 150);
		$(".clickhere").fadeOut(100);
	});

	/***************************************************************************
	 * /* feature box hover /
	 **************************************************************************/
	$(".feature_box").hover(function() {

		$(this).stop().animate({
			backgroundColor : "#51a5fc"

		}, 150);

		$(this).find('.clickhere').fadeIn(100);
	}, function() {

		$(this).stop().animate({
			backgroundColor : "#5687b5"

		}, 150);
		$(".clickhere").fadeOut(100);
	});

	/***************************************************************************
	 * /* Sticky Nav /
	 **************************************************************************/

	var navPos = $('.nav').offset().top;
	if ($('.features').length > 0) {
		var featuresPos = $('.features').offset().top;
	}
	$(window).on('scroll', function(evt) {
		var scrollTop = $(this).scrollTop()
		winHeight = $(window).height();

		window.clearTimeout(window.timeout);

		window.timeout = setTimeout(function() {
			// Set the sticky nav
			if (scrollTop > navPos) {
				$('.nav').not('.sticky').addClass('sticky');

			} else {
				$('.nav.sticky').removeClass('sticky');
			}

			if (scrollTop > (featuresPos - 20)) {
				$('.features').not('.sticky2').addClass('sticky2');
				$('.sticky2').stop().animate({

					top : scrollTop - 250

				}, 150);

			} else {
				$('.features.sticky2').removeClass('sticky2');

			}

		}, 10);
	});

	/***************************************************************************
	 * /* Scroll to /
	 **************************************************************************/
	$('.feature_box a').on('click', function(evt) {
		$.scrollTo($(this).attr('href'), 800, {
			offset : -40
		});

		return false;

	});

	$('.services_box a').on('click', function(evt) {
		$.scrollTo($(this).attr('href'), 800, {
			offset : -40
		});

		return false;

	});
	$('.service a').on('click', function(evt) {
		$.scrollTo($(this).attr('href'), 800, {
			offset : -40
		});

		return false;

	});

	/***************************************************************************
	 * /* Central Services rollovers /
	 **************************************************************************/

	$('.services').mouseenter(function() {

		$(this).stop().animate({
			backgroundColor : "#51a5fc"

		}, 150);

	});
	$('.services').click(function() {
		var serviceid = "#box_" + $(this).attr('id');

		$(".service").stop().animate({
			backgroundColor : "#5687B5"

		}, 150);
		$(serviceid).stop().animate({
			backgroundColor : "#51a5fc"

		}, 150);

	});

	$('.services').mouseleave(function() {

		$(this).stop().animate({
			backgroundColor : "#077eff"

		}, 150);

	});

	$('.service').click(function() {

		$(".service").stop().animate({
			backgroundColor : "#5687B5"

		}, 150);
		$(this).stop().animate({
			backgroundColor : "#51a5fc"

		}, 150);

	});

});

/*******************************************************************************
 * /* vertical accordion on maps page /
 ******************************************************************************/
function unitClick(id, unitID) {
	// reset block colours
	$('.shield').stop().animate({
		opacity : 0.8,
		color : '#fff'
	});	
	
	$('#' + id).stop().animate({
		opacity : 0.5,
		color : '#000'
	});
	
	loadUnit(unitID);
	
}

function loadUnit(id) {
	
	$("#unitData").load(base_url + "welcome/unitinfo/" + id, function(){
		  //function executed when load is done.
		});
	
	$( "#unitData" ).dialog( "open" );
}

function initMenus() {
	$('ul.unitmenu ul').hide();
	$.each($('ul.unitmenu'), function() {
		$('#' + this.id + '.expandfirst ul.current').show();
	});
	$('ul.unitmenu li a').click(function() {
		var checkElement = $(this).next();
		var block = $(this).attr('id');

		var parent = this.parentNode.parentNode.id;


		
		
		// close other accordions
		if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			$('#' + parent + ' ul:visible').slideUp('normal');
			// reset block colours
			$('.shield').stop().animate({
				opacity : 0.8,
				color : '#fff'
			});
		}

		// set current block to colour
		$('.' + block).stop().animate({
			opacity : 0.5,
			color : '#000'
		});

		if ($('#' + parent).hasClass('noaccordion')) {
			$(this).next().slideToggle('normal');
			return false;
		}
		if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
			if ($('#' + parent).hasClass('collapsible')) {
				$('#' + parent + ' ul:visible').slideUp('normal');
			}
			return false;
		}
		if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			$('#' + parent + ' ul:visible').slideUp('normal');
			checkElement.slideDown('normal');
			return false;
		}
	});
}
$(document).ready(function() {
	initMenus();
	$.fx.speeds._default = 300;
	
	$(function() {
		$( "#unitData" ).dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade"
		});

		
	});
});

/*******************************************************************************
 * /* passthrough clicker for IE /
 ******************************************************************************/

function passThrough(e) {
	$(".clickthrough").each(
			function() {

				// check if clicked point (taken from event) is inside element
				var mouseX = e.pageX;
				var mouseY = e.pageY;
				var offset = $(this).offset();
				var width = $(this).width();
				var height = $(this).height();

				if (mouseX > offset.left && mouseX < offset.left + width
						&& mouseY > offset.top && mouseY < offset.top + height)

					$(this).click(); // force click event

			});
}

$(document).ready(function() {
	$(".shield").click(passThrough);

	$(".clickthrough").click(

	function() {
		
		var parent = this.parentNode.id;
		var unitID = $('.' + parent).attr('id');
		
		$('.shield').stop().animate({
			opacity : 0.8,
			color : '#fff'
		});
		$(this).parent().stop().animate({
			opacity : 0.5,
			color : '#000'

		}, 150);
		
		loadUnit(unitID);

	});

});
