var notice={
	jqajax1 : function(){
        $.ajax({
			type: "POST",
            url: "/arms1/index.php?m=admin&c=index&a=pttz",  
            data: { reimbursementcategory:$("select[name=reimbursementcategory]").val(),
					contest:$("textarea[name=contest]").val(),
				},
            success: function(data){
                alert("111");
            },
			error: function(data){
				alert("发送失败");
			}
        });  
    }
}
