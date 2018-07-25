$(function(){
	$('[name="btn_user_login"]').click(function(){
		
		var username = $('[name="txt_user_name"]');
		var password = $('[name="txt_password"]');
		
		var dataString = 
		'username='+username.val()+
		'&&password='+password.val();
		
		$.ajax({
			type:'post',
			url:'post_url/user_login',
			data:dataString,
			success:function(data){
				var arr = new Array();
				arr = data.split("|");
				if(arr[0] == "1"){
					rh_msgbox(arr[1]);
					return;
				}
				
				window.location.href = 'user_panel/dashboard';
			}
		});
	});
});