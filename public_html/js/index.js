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
            for (var i = 0; i < obj.length; i++ ) {
                $("#squares").append(
'<div style="float:left; width:200px; height:200px">'+
'    <a class="main_image" href="picture.php?article='+$("#article").html()+'&image='+obj[i].id+'">'+
'        <img src="'+obj[i].small+'" style="clip:rect(auto, 200px, 200px, auto); position:absolute;">'+
'    </a>'+
'</div>'
                );
            }
            page++;
        },
        error: function(data){
               }
    });
    });
})

