var MenuList = function () {

    var menuInit = function () {
        // Select2
        var select2 = $(".select2_single");
        select2.select2({
            placeholder: "请选择上级分类",
            allowClear: true
        });

        // nestable
        $('#nestable_list_3').nestable();
    };

    return {
        init: menuInit
    };
}();
