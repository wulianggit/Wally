var Category = function () {

    var categoryInit = function () {
        
        // 添加子分类按钮事件
        $('.createCate').on('click', function () {
            $('.cate_title').html('添加分类');
            // 移除在修改分类时添加的ID的隐藏域
            $('input[name="id"]').remove();
            // 移除在修改分类时添加的method隐藏域
            $('input[name="_method"]').remove();
            // 修改表单action地址
            var _addUrl = $(this).attr('data-href');
            $("#cateForm").attr('action', _addUrl);
            // 清空表单
            $("#cateForm input.form-control").val('');
            // 选中当前分类为上级分类
            select2.val($(this).attr('data-pid')).trigger('change');
        });

        // 修改分类按钮事件
        $('.editCate').on('click', function () {
            $('.cate_title').html('修改分类');
            var _editUrl = $(this).attr('data-href');
            $.ajax({
                url  : _editUrl,
                type : 'get',
                success : function (cateData) {
                    if (cateData.status == 'success') {
                        categoryHandle.initAttribute(cateData, select2);
                    } else {
                        // layer 提示
                        layer.msg(cateData.msg);
                    }
                }
            });
        });
        
        // 删除分类按钮事件
        $('.destoryCate').on('click', function () {
            var _id = $(this).attr('data-id');
            layer.confirm('你确定要删除吗?', {
                btn : ['确认', '取消'] // 弹出框的按钮文字
            }, function () {
                $('form[name="delete_cate_'+_id+'"]').submit();
            });
        });
    };


    // 处理分类更新操作表单
    var categoryHandle = function(){
        var loadCateData = function (cateData, select2) {
            // 上级分类选中相应的值
            select2.val(cateData.pid).trigger('change');
            $('input[name="name"]').val(cateData.name);
            $('input[name="sort"]').val(cateData.sort);

            // 设置表单的提交地址
            $("#cateForm").attr('action', cateData.update);

            // 隐藏域存入需要修改的分类ID  不存在时创建,存在则更新值
            var _hiddenId = $('input[name="id"]');
            if (_hiddenId.length > 0) {
                _hiddenId.val(cateData.id);
            } else {
                $("#cateForm").append('<input type="hidden" name="id" value="'+cateData.id+'">');
            }

            // 创建一个隐藏域表示是更新操作
            var _method = $("#_method");
            if (_method.length < 1) {
                $("#cateForm").append('<input type="hidden" name="_method" id="_method" value="PATCH">');
            }
        };
        return {
            initAttribute : loadCateData
        };
    }();

    return {
        init: categoryInit
    };
}();
