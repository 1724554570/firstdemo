$(function () {
    $(".gotopage").click(function () {
        var pages = parseInt($(this).attr("data-page"));
        var showpage = parseInt($("#showpage").val());
        if (pages == showpage || pages == 0) {
            return;
        }
        var url = $("#loadUrl").val();
        var searchname = $("#searchname").val();
        var datas = {page: pages, searchname: searchname};
        MenusThis.loadSearchPram(url, datas);
    });
    $(".bottom").click(function () {
        var url = $("#loadUrl").val();
        var pages = "";
        var searchname = $("#searchname").val();
        var datas = {page: pages, searchname: searchname};
        MenusThis.loadSearchPram(url, datas);
    });
    $(".bottom2").click(function () {
        var url = $("#delckUser").val();
        var pages = $("#showpage").val();
        var searchname = $("#searchname").val();
        var mid = $(this).attr("data-mid");
        var datas = {page: pages, searchname: searchname, mid: mid};
        MenusThis.loadSearchPram(url, datas);
    });
});