<div id="picContainer">
    <div>
        <img src="<?=$picture->url?>" class="workPic" id="coverPic"
        onerror="document.getElementById('mainPic').src='<?=$picture->small?>'">
        <img src="/png.php?id=<?=$work->id?>" class="workPic" id="bgPic">
    </div>
</div>
<div id="rightSidebar">
</div>
