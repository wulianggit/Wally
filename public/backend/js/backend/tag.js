var Tag = function () {

    var tagInit = function () {
        // 修改标签按钮事件
        $('.editTag').on('click', function () {
            $('.tag_title').html('修改标签');
            var _editUrl = $(this).attr('data-href');
            $.ajax({
                url  : _editUrl,
                type : 'get',
                success : function (tagData) {
                    if (tagData.status == 'success') {
                        tagHandle.initAttribute(tagData);
                    } else {
                        // layer 提示
                        layer.msg(tagData.msg);
                    }
                }
            });
        });

        // 删除标签按钮事件
        $('.destoryTag').on('click', function () {
            var _id = $(this).attr('data-id');
            layer.confirm('你确定要删除吗?', {
                btn : ['确认', '取消'] // 弹出框的按钮文字
            }, function () {
                $('form[name="delete_tag_'+_id+'"]').submit();
            });
        });
    };


    // 处理标签更新操作表单
    var tagHandle = function(){
        var loadTagData = function (tagData) {
            // 设置表单的提交地址
            $("#tagForm").attr('action', tagData.update);
            $("input[name='name']").val(tagData.name);

            // 隐藏域存入需要修改的标签ID  不存在时创建,存在则更新值
            var _hiddenId = $('input[name="id"]');
            if (_hiddenId.length > 0) {
                _hiddenId.val(tagData.id);
            } else {
                $("#tagForm").append('<input type="hidden" name="id" value="'+tagData.id+'">');
            }

            // 创建一个隐藏域表示是更新操作
            var _method = $("#_method");
            if (_method.length < 1) {
                $("#tagForm").append('<input type="hidden" name="_method" id="_method" value="PATCH">');
            }
        };
        return {
            initAttribute : loadTagData
        };
    }();

    return {
        init: tagInit
    };
}();
