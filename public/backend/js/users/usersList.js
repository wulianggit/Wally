var usersList = function (){
	var usersListInit = function () {
		$('#datatable-responsive').DataTable({
			"processing": true,
			"ajax" : {'url' : '/admin/user/ajaxGetUserList'},
			"columns" : [
				{"data" : "ID"},
				{"data" : "Name", "orderable" : false},
				{"data" : "UserName", "orderable" : false},
				{"data" : "Role", "orderable" : false},
				{"data" : "Email", "orderable" : false},
				{"data" : "AddTime"}
			],
		});
	};

	return {
		init : usersListInit
	}
}();