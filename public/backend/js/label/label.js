var Label = function () {

    var labelInit = function () {

        // nestable
        $('#labelList').nestable();

        // 修改标签按钮事件
        $('.editLabel').on('click', function () {
            $('.label_title').html('修改标签');
            var _editUrl = $(this).attr('data-href');
            $.ajax({
                url  : _editUrl,
                type : 'get',
                success : function (labelData) {
                    if (labelData.status == 'success') {
                        labelHandle.initAttribute(labelData);
                    } else {
                        // layer 提示
                        layer.msg(labelData.msg);
                    }
                }
            });
        });

        // 删除标签按钮事件
        $('.destoryLabel').on('click', function () {
            var _id = $(this).attr('data-id');
            layer.confirm('你确定要删除吗?', {
                btn : ['确认', '取消'] // 弹出框的按钮文字
            }, function () {
                $('form[name="delete_label_'+_id+'"]').submit();
            });
        });
    };


    // 处理标签更新操作表单
    var labelHandle = function(){
        var loadLabelData = function (labelData) {
            // 设置表单的提交地址
            $("#labelForm").attr('action', labelData.update);
            $("input[name='name']").val(labelData.name);

            // 隐藏域存入需要修改的标签ID  不存在时创建,存在则更新值
            var _hiddenId = $('input[name="id"]');
            if (_hiddenId.length > 0) {
                _hiddenId.val(labelData.id);
            } else {
                $("#labelForm").append('<input type="hidden" name="id" value="'+labelData.id+'">');
            }

            // 创建一个隐藏域表示是更新操作
            var _method = $("#_method");
            if (_method.length < 1) {
                $("#labelForm").append('<input type="hidden" name="_method" id="_method" value="PATCH">');
            }
        };
        return {
            initAttribute : loadLabelData
        };
    }();

    return {
        init: labelInit
    };
}();
