var usersList = function (){
	var usersListInit = function () {
		$('#datatable-responsive').DataTable({
			"searching" : true,
			"processing": true,//DataTables载入数据时，是否显示‘进度’提示
			"ajax" : {'url' : '/admin/user/ajaxGetUserList'},
			"columns" : [
				{"data" : "ID"},
				{"data" : "Name", "orderable" : false},
				{"data" : "UserName", "orderable" : false},
				{"data" : "Role", "orderable" : false},
				{"data" : "Email", "orderable" : false},
				{"data" : "AddTime"}
			],
			"language":{
                "search":"搜索",
                "lengthMenu" : "显示 _MENU_ 条",
                "info" : "从 _START_ 到  _END_ 条记录 总记录数为 _TOTAL_ 条",
                "paginate": {
                    "first" : "第一页",
                    "previous" : "上一页",
                    "next" : "下一页",
                    "last" : "最后一页"
                }
            }
		});
	};

	return {
		init : usersListInit
	}
}();
