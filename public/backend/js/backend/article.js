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

    return {
        editor: editorMd
    }
}();
