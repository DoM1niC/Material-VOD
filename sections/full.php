 <div id="<?= $str ?>" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;" class="modal video permalink">
<div><br><a id="close" style="margin-right: 20px;" class="fa-2x fa-white fa fa-times close right"></a></div>
      <h4 style="margin-left: 20px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;"><?= $str ?></h4>
                        <video id="videofull" class="close_player z-depth-1 video-js vjs-default-skin vjs-16-9 vjs-big-play-centered" controls preload="none" width="720" data-setup="{}">
    <source src="<?= $convertedLocation ?><?= $category[$_GET["cat"]] ?>/<?= $video ?>" type='video/mp4'></video>
        </div>
