$(function(){
  $("#slides").slidesjs({
    width: 759,
    height: 300,
    callback: {
	    complete: function(number) {
	    	$('.news-title').fadeOut('fast',function(){
		    	$('#news-title-'+number).fadeIn('fast');
	    	});
	    	$('.news-button').fadeOut('fast',function(){
		    	$('#news-button-'+number).fadeIn('fast');
	    	});
	    }
	}
  });
  $('#news-title-1,#news-button-1').show();
});
// Activer l'habillage
function habillage() {
	$('#header').addClass('habillage');
	$('#all').addClass('habillage');
	
	//Simulate
	//$('body').addClass('simulate-habillage');
}
// Activer le menu
function menu(item){
	$('#sub-menu-'+item).show();
	$('#menu-'+item).addClass('active');
}
// Sous-menu
function subMenu(item){
	$('#sub-menu-link-'+item).addClass('active');
}
// Changer page dans Mon compte
function monCompte(item){
	$('.config-menu a').removeClass('bold');
	$('#config-link-'+item).addClass('bold');
	$('.config').hide();
	$('#'+item).show();
}
function updateEmail(){
	$.post("ajax/update-email.php", { 
		email: $('#email-input').val()
	})
	.done(function(data) {
		$('#result').html(data).slideDown();
	});
}
function updatePassword(){
	$.post("ajax/update-password.php", { 
		password: $('#password-input').val()
	})
	.done(function(data) {
		$('#result2').html(data).slideDown();
	});
}
function updateMusique(data){
	$.post("ajax/update-musique.php", { 
		musique: $('#musique-input').val()
	})
	.done(function(data) {
		$('#result3').html(data).slideDown();
	});
}
// Poster un commentaire
function commentaire(){
	$.post("ajax/post-comment.php", { message: $('#message-commentaire').val(), nid: $('#coms-id').val() })
	.done(function(data) {
		$('#message-commentaire').val('').attr('disabled','disabled').addClass('disabled').attr('placeholder','Merci !');
		$('#commentaires').prepend(data);
	});
}

// Mon compte : profile
function profile(){
	$.post("ajax/update-profile.php", { 
		textamigo: $('#friend').is(':checked'),
		online: $('#statut').is(':checked'),
		join: $('#join').is(':checked'),
		troc: $('#exchange').is(':checked')
	})
	.done(function(data) {
		$('#result-profile').html(data).addClass('success').show();
	});
}

function searchCouplesAdd(){
	$.get("ajax/couples-search.php?username="+$('#search-username').val(), function(data){
		$('#resultsearch').html(data).show();
		$('#error').hide();
	});
}
function addLove(id) {
	$.get("ajax/couples-add.php?ide="+id, function(data){
		$("#resultsearch").html(data);
	});
}
function voteLove(id){
	$.get("ajax/couples-vote.php?id="+id, function(data){
		$("#result").html(data).slideDown();
		setTimeout(function(){
			$('#result').slideUp();
		},4000);
	});
}
function voteLoveJetons(id){
	$.get("ajax/couples-vote-jetons.php?id="+id, function(data){
		$("#result").html(data).slideDown();
		setTimeout(function(){
			$('#result').slideUp();
		},4000);
	});
}

function forumUpdate(){
	$.get("ajax/forum-membres",function(data){});
}
function forumClear(){
	$.get("ajax/forum-clear-0",function(data){});
}

function donnerAvis(note){
	$.get("ajax/note-globale.php?note="+note,function(data){
		window.location = '#note-more';
	});
}

function showTutoriel(id){
	$(id).toggle();
}

function ourhabillage(){
	$('body').addClass('our-habillage');
	$('#all').addClass('our-habillage');
}
/*$(function() { // this will make sure the relevant DOM elements are loaded first   
	$(document).on("click", function() {
	  window.open('http://track.effiliation.com/servlet/effi.click?id_compteur=12890255');
	});
	$('#all').on("click", function(evt) {
	    evt.stopPropagation();
	});
});*/

function modalConfirm(src,price,id){
    $('#confirmImg').attr('src',"c_images/album1584/"+src+".gif");
    $('#priceConfirm').html(price+' Duckets');
    $('#confirmButton').attr('onclick','buyBadge('+id+')');
}

function buyBadge(id){
	$.get("ajax/buy-badge.php?id="+id,function(data){
		alert(data);
		window.location='';
	});
}

function voteCoupleDuckets(){
	$.get("ajax/vote-couple-duckets.php",function(data){
		alert(data);
		window.location='#close';
	});
}
function nextPay(pid,codeNP){
	$.get("ajax/next-pay.php?type="+pid+"&code="+codeNP+"",function(data){
		$('#result').html(data);
	});
}

function buyWin(nbj){
	$.get("ajax/buy-win.php?j="+nbj+"",function(data){
		$('#result').html(data);
	});
}

function buyDedi(){
	$.post("ajax/buy-dedi.php", { 
		dedi: $('#dedi-input').val()
	})
	.done(function(data) {
		alert(data);
	});
}
function buyMimic(){
	$.post("ajax/buy-mimic.php", { 
		mimic: $('#dedi-input').val()
	})
	.done(function(data) {
		alert(data);
	});
}
function convertPoint(){
	$.post("ajax/convert-point.php", { 
		jetons: $('#jetons').val()
	})
	.done(function(data) {
		alert(data);
	});
}
function goVIP(){
	$.post("ajax/becomeVIP.php", { 
		b1: $('#b1').val(),
		b2: $('#b2').val(),
		b3: $('#b3').val(),
		b4: $('#b4').val(),
		b5: $('#b5').val(),
		dedi: $('#dedi-input').val(),
		type: $('#type').val()
	})
	.done(function(data) {
		$('#result').html(data);
	});
}

function addYoutube(){
    $.post("ajax/add-yt.php", { 
		tid: $('#tid').val(),
		ytitle: $('#yt-titre').val(),
		ydesc: $('#yt-desc').val()
	})
	.done(function(data) {
		$('#result').html(data);
	});
}

function deleteYoutube(vid2,uid2){
	$.post("ajax/delete-yt.php", { 
		vid: vid2,
		uid: uid2
	})
	.done(function(data) {
		$('#result').html(data);
	});
}

function booster(pid,codeNP,uid){
	$.get("ajax/concours-booster.php?type="+pid+"&code="+codeNP+"&uid="+uid,function(data){
		$('#result').html(data);
	});
}

function voterConcours(captcha,uid){
	$.get("ajax/concours-vote.php?uid="+uid+"&captcha="+captcha,function(data){
		$('#result').html(data);
	});
}

function shareConcours(uid){
	$.get("ajax/concours-share.php?uid="+uid,function(data){
		$('#result').html(data);
	});
}

function concoursInscription(){
	$.get("ajax/concours-inscription.php",function(data){
		$('#resultA').html(data);
	});
}


$(document).ready(function() {
    $('#dedi-in').cycle({
		fx: 'fade',
		timeout:5000,
		speed:400
	});
});


;(function($) {

    $.fn.dropit = function(method) {

        var methods = {

            init : function(options) {
                this.dropit.settings = $.extend({}, this.dropit.defaults, options);
                return this.each(function() {
                    var $el = $(this),
                         el = this,
                         settings = $.fn.dropit.settings;
                    
                    // Hide initial submenus     
                    $el.addClass('dropit')
                    .find('>'+ settings.triggerParentEl +':has('+ settings.submenuEl +')').addClass('dropit-trigger')
                    .find(settings.submenuEl).addClass('dropit-submenu').hide();
                    
                    // Open on click
                    $el.on(settings.action, settings.triggerParentEl +':has('+ settings.submenuEl +') > '+ settings.triggerEl +'', function(){
                        if($(this).parents(settings.triggerParentEl).hasClass('dropit-open')) return false;
                        settings.beforeHide.call(this);
                        $('.dropit-open').removeClass('dropit-open').find('.dropit-submenu').hide();
                        settings.afterHide.call(this);
                        settings.beforeShow.call(this);
                        $(this).parents(settings.triggerParentEl).addClass('dropit-open').find(settings.submenuEl).show();
                        settings.afterShow.call(this);
                        return false;
                    });
                    
                    // Close if outside click
                    $(document).on('click', function(){
                        settings.beforeHide.call(this);
                        $('.dropit-open').removeClass('dropit-open').find('.dropit-submenu').hide();
                        settings.afterHide.call(this);
                    });
                    
                    settings.afterLoad.call(this);
                });
            }
            
        }

        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error( 'Method "' +  method + '" does not exist in dropit plugin!');
        }

    }

    $.fn.dropit.defaults = {
        action: 'click', // The open action for the trigger
        submenuEl: 'ul', // The submenu element
        triggerEl: 'a', // The trigger element
        triggerParentEl: 'li', // The trigger parent element
        afterLoad: function(){}, // Triggers when plugin has loaded
        beforeShow: function(){}, // Triggers before submenu is shown
        afterShow: function(){}, // Triggers after submenu is shown
        beforeHide: function(){}, // Triggers before submenu is hidden
        afterHide: function(){} // Triggers before submenu is hidden
    }

    $.fn.dropit.settings = {}

})(jQuery);

$(function() {
    $('.menu').dropit({
	    beforeShow: function(){
	    	$('.top-link').removeClass('clicked');
		    $(this).addClass('clicked');
	    },
	    afterHide: function(){
		    $('.top-link').removeClass('clicked');
	    }
    });
});


function link(val){
	window.location=val;
}


(function($){
	
	// Number of seconds in every time division
	var days	= 24*60*60,
		hours	= 60*60,
		minutes	= 60;
	
	// Creating the plugin
	$.fn.countdown = function(prop){
		
		var options = $.extend({
			callback	: function(){},
			timestamp	: 0
		},prop);
		
		var left, d, h, m, s, positions;

		// Initialize the plugin
		init(this, options);
		
		positions = this.find('.position');
		
		(function tick(){
			
			// Time left
			left = Math.floor((options.timestamp - (new Date())) / 1000);
			
			if(left < 0){
				left = 0;
			}
			
			// Number of days left
			d = Math.floor(left / days);
			updateDuo(0, 1, d);
			left -= d*days;
			
			// Number of hours left
			h = Math.floor(left / hours);
			updateDuo(2, 3, h);
			left -= h*hours;
			
			// Number of minutes left
			m = Math.floor(left / minutes);
			updateDuo(4, 5, m);
			left -= m*minutes;
			
			// Number of seconds left
			s = left;
			updateDuo(6, 7, s);
			
			// Calling an optional user supplied callback
			options.callback(d, h, m, s);
			
			// Scheduling another call of this function in 1s
			setTimeout(tick, 1000);
		})();
		
		// This function updates two digit positions at once
		function updateDuo(minor,major,value){
			switchDigit(positions.eq(minor),Math.floor(value/10)%10);
			switchDigit(positions.eq(major),value%10);
		}
		
		return this;
	};


	function init(elem, options){
		elem.addClass('countdownHolder');

		// Creating the markup inside the container
		$.each(['Days','Hours','Minutes','Seconds'],function(i){
			$('<span class="count'+this+'">').html(
				'<span class="position">\
					<span class="digit static">0</span>\
				</span>\
				<span class="position">\
					<span class="digit static">0</span>\
				</span>'
			).appendTo(elem);
			
			if(this!="Seconds"){
				elem.append('<span class="countDiv countDiv'+i+'"></span>');
			}
		});

	}

	// Creates an animated transition between the two numbers
	function switchDigit(position,number){
		
		var digit = position.find('.digit')
		
		if(digit.is(':animated')){
			return false;
		}
		
		if(position.data('digit') == number){
			// We are already showing this number
			return false;
		}
		
		position.data('digit', number);
		
		var replacement = $('<span>',{
			'class':'digit',
			css:{
				top:'-2.1em',
				opacity:0
			},
			html:number
		});
		
		// The .static class is added when the animation
		// completes. This makes it run smoother.
		
		digit
			.before(replacement)
			.removeClass('static')
			.animate({top:'2.5em',opacity:0},'fast',function(){
				digit.remove();
			})

		replacement
			.delay(100)
			.animate({top:0,opacity:1},'fast',function(){
				replacement.addClass('static');
			});
	}
})(jQuery);