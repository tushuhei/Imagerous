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
'    <form id="pictureForm'+page+'_'+i+'" method="get" action="picture.php">'+
'        <a class="main_image" href="javascript:document.getElementById(\'pictureForm'+page+'_'+i+'\').submit()">'+
'            <img src="'+obj[i].small+'" class="main_image">'+
'            <input type="hidden" name="article" value="'+$("#article").html()+'">'+
'            <input type="hidden" name="image" value="'+obj[i].id+'">'+
'            <input type="hidden" name="page" value="'+page+'">'+
'        </a>'+
'    </form>'+
'</div>'
                );
            }
        },
        error: function(data){
               }
    });
    });
})

