+function ($) {
    var Menus = {
        init: function () {
            var self = this,
                    //文档目录菜单
                    $menu = $("nav");
            this.menu = $menu;
            /* 初始化树形菜单，完成后高亮显示当前菜单 */
            $menu.thinktree();
        },
        // 分页
        loadSearch: function (url, pages) {
            //var _loading = $("#loading");
            //_loading.show();
            $.post(url, {page: pages}, function (data) {
                //_loading.hide();
                $(".content").html(data);
            });
        },
        loadSearchPram: function (url, datas) {
            var data = datas;
            $.post(url, data, function (data) {
                $(".content").html(data);
            });
        }
    };
    /* 设置全局访问变量 */
    window.MenusThis = Menus;
}(jQuery);
$(function () {
});