var login = {
	check:function(){
		//获取登录页面中的用户名和密码
		var username = $('input[name="username"]').val();
		var password = $('input[name="password"]').val();

		if(!username){
			alert('用户名不能为空');
		}
		if(!password){
			alert('密码不能为空');
		}

		var url="/arms1/index.php?m=admin&c=login&a=check";
		var data={'username':doctorid,'password':password};
		//执行异步请求  $.post
		$.post(url,data,function(result){
			if(result.status==0){
				return alert('登录失败');
			}
			if(result.status==1){
				return alert('登录成功');
				window.location="/arms1/index.php?m=admin&c=index";
			}
		},'JSON');
	}
}