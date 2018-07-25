/* $(function(){
	$(window).load(function(){
		setTimeout(function(){
		alert('ddd');
		}, 2000);
	});
}); */
window.onresize = function(){
	var rh_resize = new rh_msgbox_resize();
	if($('#rh_msgbox').css("display") == "block"){
		rh_resize.msgbox();
	}
	if($('#rh_confirm').css("display") == "block"){
		rh_resize.confirm();
	}
};
function rh_msgbox(text){
	var hh = $('body').height();
	$('#rh_msgbox_text').empty();
	$('#rh_msgbox_text').append(text);
	$('#rh_screen').css({display:"block", height:hh});
	var rh_resize = new rh_msgbox_resize();
	rh_resize.msgbox();
	$('#rh_msgbox').animate({opacity:"1"}, 500);
	$('#rh_txt_505').focus();
}
function rh_confirm(text){
	var hh = $('body').height();
	$('#rh_confirm_text').empty();
	$('#rh_confirm_text').append(text);
	$('#rh_screen').css({display:"block", height:hh});
	var rh_resize = new rh_msgbox_resize();
	rh_resize.confirm();
	$('#rh_confirm').animate({opacity:"1"}, 500);
	$('#rh_txt_501').focus();
}
function rh_msgbox_close(){
	$('#rh_msgbox').animate({opacity:"0"}, 500);
	//$('#rh_msgbox').css("opacity", "0");
	$('#rh_msgbox_text').append('');
	
	setTimeout(function(){
		$('#rh_screen').css("display", "none");
		$('#rh_msgbox').css("display", "none");
	},600);
}
/* function rh_msgbox_close(){
	$('#rh_msgbox').css("opacity", "0");
	$('#rh_msgbox_text').append('');
	$('#rh_screen').css("display", "none");
	$('#rh_msgbox').css("display", "none");
} */


/* function rh_confirm_close(){
	$('#rh_confirm').animate({opacity:"0"}, 500);
	setTimeout(function(){
		$('#rh_screen').css("display", "none");
		$('#rh_confirm').css("display", "none");
	},600);
} */

function rh_confirm_close(){
	$('#rh_confirm').css("opacity", "0");
	$('#rh_confirm_text').append('');
	$('#rh_screen').css("display", "none");
	$('#rh_confirm').css("display", "none");
}

function rh_msgbox_resize(){
	var pw = $(window).width();
	var ph = $(window).height();
	var px = (pw/2)-150;
	//var py = (ph/2)-100;
	var py = 30+'%';
	
	this.msgbox = function(){
		$('#rh_msgbox').css({display:"block", left:px, top:py});
	}
	this.confirm = function(){
		$('#rh_confirm').css({display:"block", left:px, top:py});
	}
}
//var rh_resize = new rh_msgbox_resize();

function del(){
	var r = confirm("Sure");
	if(r == true){
		msgbox('done');
	}
}
function myfunc(){
	rh_confirm('Are you Sure?');
	document.getElementById('rh_confirm_yes').onclick = function(){
		rh_confirm_close();
		alrt();
	};
}
function myfunc2(){
	rh_confirm('Confirm Action?');
	document.getElementById('rh_confirm_yes').onclick = function(){
		rh_confirm_close();
		rh_msgbox('ok, done');
	};
}
function alrt(){
	rh_msgbox('nice');
}
/* $(function(){
	$('#rh_confirm_yes').click(function(){
		alert('done');
	});
}); */