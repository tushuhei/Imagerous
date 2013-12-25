var opti_domain = "http://dev.imagero.us:5000";

function get_params() {
    $.ajax({
        type: "GET",
        url: opti_domain + "/gen",
        dataType: "jsonp",
        jsonpCallback: "callback",
        data: {"optikey": $.cookie("optikey")},
        success: function(res){
            $.cookie("optikey", res.optikey, { expires: 7 });
            revise(res.params);
            send_log("view", 1);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            console.log(textStatus, errorThrown.message);
            $(".main_image").css("display", "block");
        }
    });
}

function revise(params) {
    for (var i = 0; i < params.length; i++) {
        var selector = params[i]["selector"];
        var property = params[i]["property"];
        var level = params[i]["level"];
        $(selector).css(property, level);
    }
    $(".main_image").css("display", "block");
}


function send_log(action, value) {
    $.ajax({
        type: "POST",
        url: opti_domain + "/obs",
        dataType: "jsonp",
        jsonpCallback: "observed",
        data: {
            "optikey": $.cookie("optikey"),
            "action": action,
            "value": value,
            "url": document.URL
        },
        success: function(res){
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            console.log(textStatus, errorThrown.message);
            return {};
        }
    });
}

window.onload = function () {
    get_params();
}
