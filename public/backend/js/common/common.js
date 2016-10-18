var Common = function () {
    // select2
    var initSelect2 = function (className, msg) {
        var select2 = $("."+className);
        select2.select2({
            placeholder: msg,
            allowClear: true
        });
    };

    // nestable
    var initNestable = function (idName, fold) {
        $('#'+idName).nestable();
        if (fold) {
            // 折叠所有子节点
            $('.dd').nestable('collapseAll');
        }
    };

    return {
        initSelect2  : initSelect2,
        initNestable : initNestable
    }
}();
