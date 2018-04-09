var notice={
	jqajax1 : function(){
        $.ajax({
			type: "POST",
            url: "/arms1/index.php?m=admin&c=index&a=npttz",  
            data: { reimbursementcategory:$("select[name=reimbursementcategory]").val(),
					contest:$("textarea[name=contest]").val(),
				},
            success: function(data){
                alert("111");
            },
			error: function(data){
				alert("∑¢ÀÕ ß∞‹");
			}
        });  
    }
}
