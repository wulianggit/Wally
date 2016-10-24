var Article = function () {
    // 集成Markdown编辑器
    var editorMd = function (item,path,upload) {
        var editor = editormd(item,{
            width   : "100%",
            height  : 640,
            syncScrolling : "single",
            toolbarAutoFixed: false,
            gotoLine:false,
            emoji:true,
            saveHTMLToTextarea:true,
            path    : path,
            imageUpload : true,
            imageUploadURL : upload
        });
    };

    // 文章列表
    var articleList = function (ID) {
        $("#"+ID).DataTable({
            "processing": true,//DataTables载入数据时，是否显示‘进度’提示
            "ajax" : {'url' : '/admin/article/ajaxGetArticleList'},
            "columns" : [
                {"data" : "ID"},
                {"data" : "Title", "orderable" : false},
                {"data" : "Category", "orderable" : true},
                {"data" : "AddTime", "orderable" : true},
                {"data" : "UpdateTime", "orderable" : true},
                {"data" : "ActionButton","orderable" : false}
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
        editor: editorMd,
        articleList : articleList
    }
}();
