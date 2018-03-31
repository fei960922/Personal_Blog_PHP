$(document).ready(function(){
	fontmaking();
});
function fontmaking() {
    var resultStr = $(".SiYuanRegular").text();
    var md5 = "";
    resultStr = Trim(resultStr);
    resultStr = SelectWord(resultStr);
    md5 = $.md5("8564236f5a9742d0b98cbd804fd3c033"+"SiYuanRegular" + resultStr);
    $.getJSON("http://www.youziku.com/webfont/CSSPOST?jsoncallback=?", { "id": md5, "guid": "8564236f5a9742d0b98cbd804fd3c033", "type": "5" }, function (json) {
        if (json.result == 0) $.post("http://www.youziku.com/webfont/PostCorsCreateFont", { "name": "SiYuanRegular", "gid": "8564236f5a9742d0b98cbd804fd3c033", "type": "5", "text": resultStr });
        else loadExtentFile("http://www.youziku.com/webfont/css?id=" + md5 + "&guid=" + "8564236f5a9742d0b98cbd804fd3c033" + "&type=5");
    });
}
