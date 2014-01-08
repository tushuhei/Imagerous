var opti_domain = "http://opti.imagero.us";

function get_params() {
    $.ajax({
        type: "GET",
        url: opti_domain + "/gen",
        dataType: "jsonp",
        jsonpCallback: "callback",
        data: {"optikey": $.cookie("optikey")},
        timeout: 2000,
        success: function(res){
            $.cookie("optikey", res.optikey, { expires: 7 });
            revise(res.params);
            send_log("view", "start");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            $(".imager").css("display", "block");
        }
    });
}

function revise(params) {
    for (var i = 0; i < params.length; i++) {
        var selector = params[i]["selector"];
        var properties = params[i]["property"].split(":");
        var level = params[i]["level"];
        if (level == "sizeper2") level = $(".imager>div").width() / 2;
        for (var k = 0; k < properties.length; k++) {
            $(selector).css(properties[k], level);
        }
    }
    $(".imager").css("display", "block");
}


function send_log(action, value) {
    $.ajax({
        type: "POST",
        url: opti_domain + "/obs",
        dataType: "jsonp",
        jsonpCallback: "observed",
        timeout: 2000,
        data: {
            "optikey": $.cookie("optikey"),
            "action": action,
            "value": value,
            "url": document.URL
        },
        success: function(res){
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            $(".imager").css("display", "block");
        }
    });
}

window.onload = function () {
    if (_ua.ltIE6 || _ua.ltIE7 ||_ua.ltIE8) {
        $(".imager").css("display", "block");
    } else {
        get_params();
        var startTime = new Date();
        var timer = setInterval(function(){
            var curTime = new Date();
            send_log("tos", curTime - startTime);
            if (curTime - startTime > 50000) clearTimer();
        }, 5000);
        function clearTimer () {clearInterval(timer);}
    }
}

var _ua = (function(){
return {
ltIE6:typeof window.addEventListener == "undefined" && typeof document.documentElement.style.maxHeight == "undefined",
ltIE7:typeof window.addEventListener == "undefined" && typeof document.querySelectorAll == "undefined",
ltIE8:typeof window.addEventListener == "undefined" && typeof document.getElementsByClassName == "undefined",
ltIE9:document.uniqueID && !window.matchMedia,
gtIE10:document.uniqueID && document.documentMode >= 10,
Trident:document.uniqueID,
Gecko:'MozAppearance' in document.documentElement.style,
Presto:window.opera,
Blink:window.chrome,
Webkit:!window.chrome && 'WebkitAppearance' in document.documentElement.style,
Touch:typeof document.ontouchstart != "undefined",
Mobile:typeof window.orientation != "undefined",
Pointer:window.navigator.pointerEnabled,
MSPoniter:window.navigator.msPointerEnabled
}
})();
