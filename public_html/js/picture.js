$(function() {
    $(window).bind('load', function() {
        var mainPic = document.getElementById('mainPic');
        document.getElementById('goNext').style.height = (mainPic.height - 95) + "px";
        document.getElementById('goPrev').style.height = (mainPic.height - 95) + "px";
    });

});

function loadPic (direction) {
$.ajax({
    type: "POST",
    url: "pictureAjax.php",
    data: {
        "direction": direction,
        "article": $("#articleId").html(),
        "picture": $("#pictureId").html(),
        "page": $("#pageNum").html()
    },
    success: function(data){
        var obj = JSON.parse(data);
        document.getElementById("mainPic").src = obj.small;
        document.getElementById("pictureId").innerHTML = obj.id;

        var mainPic = document.getElementById('mainPic');
        document.getElementById('goNext').style.height = (mainPic.height - 95) + "px";
        document.getElementById('goPrev').style.height = (mainPic.height - 95) + "px";
    },
    error: function(data){
           }
});
}
