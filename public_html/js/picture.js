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
        document.getElementById("downloadAnc").href = obj.url;
    },
    error: function(data){
           }
});
}
