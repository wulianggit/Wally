var permission = function () {
    var permissionList = function () {
        $('#datatable-responsive').DataTable({
            "searching" : true,
            "processing": true, // DataTables载入数据时，是否显示‘进度’提示
            "serverSide": true, // 服务端模式,在服务端处理分页
            "search":{
                regex:true,     // 开启模糊搜索
            },
            "ajax" : {'url' : '/admin/permission/ajaxGetPermissionList'},
            "columns" : [
                {
                    "data" : "id",
                    "name" : "id"
                },
                {
                    "data" : "name",
                    "name" : "name"
                },
                {
                    "data" : "display_name",
                    "name" : "display_name",
                    "orderable" : false
                },
                {
                    "data" : "description",
                    "name" : "description",
                    "orderable" : false
                },
                {
                    "data" : "created_at",
                    "name" : "created_at"
                },
                {
                    "data" : "updated_at",
                    "name" : "updated_at"
                }
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
        permissionList : permissionList
    }
}();
