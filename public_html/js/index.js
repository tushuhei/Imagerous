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
'<div class="pic_square">'+
'    <a class="main_image" href="picture.php?article='+$("#article").html()+'&image='+obj[i].id+'&page='+page+'">'+
'        <img src="'+obj[i].small+'" class="main_image">'+
'    </a>'+
'</div>'
                );
            }
        },
        error: function(data){
               }
    });
    });
})

