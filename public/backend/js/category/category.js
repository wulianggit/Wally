var Category = function () {

    var categoryInit = function () {
        // Select2
        var select2 = $(".select2_single");
        select2.select2({
            placeholder: "请选择上级分类",
            allowClear: true
        });

        // nestable 默认折叠所有子节点
        $('#nestable_list_3').nestable('collapseAll');
    };

    return {
        init: categoryInit
    };
}();
