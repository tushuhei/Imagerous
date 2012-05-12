<link rel="stylesheet" href="/js/photoswipe/photoswipe.css" />  
<script type="text/javascript" src="/js/photoswipe/lib/klass.min.js"></script>
<script type="text/javascript" src="/js/photoswipe/code.photoswipe.jquery-3.0.4.js"></script>
<ul id="Gallery">
<? foreach($article->pictures as $picture): ?>
    <li>
        <a href="<?=$picture->url?>">
            <img src="<?=$picture->small?>">
        </a>
    </li>
<? endforeach ?>
</ul>
<script>
$(document).ready(function(){
    var myPhotoSwipe = $("#Gallery a").photoSwipe({
            fadeInSpeed:1000, 
            fadeOutSpeed:1000,
        enableMouseWheel: false ,
        enableKeyboard: false 
    });
});
</script>
