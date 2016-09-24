var usersList = function (){
	var usersListInit = function () {
		$('#datatable-responsive').DataTable();
	};

	return {
		init : usersListInit
	}
}();