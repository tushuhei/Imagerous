var page = 1;

$(function(){
    $("#loadNext").click(function(){
    $.ajax({
        type: "POST",
        url: "indexAjax.php",
        data: {
            "article": $("#article").html(),
            "page": page + 1
        },
        success: function(data){
            var obj = JSON.parse(data);
            page++;
            for (var i = 0; i < obj.length; i++ ) {
                $("#squares").append(
                '    <a class="imager" href="picture.php?article='+$("#article").html()+'&image='+obj[i].id+'&page='+page+'">'+
                '        <div style="background-image: url('+obj[i].small+')"></div>'+
                '    </a>'
                );
            }
            //send_log("view", "more")
        },
        error: function(data){
               }
    });
    });
})

