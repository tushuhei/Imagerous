var page = 1;

$(function(){
    $("#loadNext").click(function(){
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {
            "query": $("#query").html(),
            "page": page + 1
        },
        success: function(data){
            var obj = JSON.parse(data);
            for (var i = 0; i < obj.length; i++ ) {
                $("#searchResultFeeds").append(
'    <a href="index.php?id='+obj[i].id+'">'+
'        <div class="feed clearfix" id="'+obj[i].id+'_'+i+'">'+
'            <div style="float:left; width:60px; text-align:center">'+
'                <img src="'+obj[i].thumb+'" width="50">'+
'            </div>'+
'            <div style="float:left;margin-left:5px;height:50px; width:710px">'+obj[i].title+
'            </div>'+
'        </div>'+
'    </a>'
                );
            }
            page++;
        },
        error: function(data){
               }
    });
    });
})

