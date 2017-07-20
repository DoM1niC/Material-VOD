<?php
$filesize = 0;
foreach(glob($convertedLocation."*") as $file) $filesize += filesize($file);
$filesize /= 1024.0 * 1024.0 * 1024.0;
$filesize = round($filesize*100)/100.0;
?>
<section class="padding" >
        <div id="show" class="container scrollspy">
            <div class="row">
                <div class="col s12 m6">
                    <h3>Uploads (<?= $filesize ?> GB)</h3>
                </div>
            </div> 
            <div class="row">
               <?php
$videos = glob($convertedLocation . '*.{[mM][pP]4,[wW][eE][bB][mM]}', GLOB_BRACE);
define("PER_PAGE_COUNT", 6);
$startIndex = isset($_GET["v"]) ? intval($_GET["v"]) * PER_PAGE_COUNT : 0;
$index = -1;
foreach($videos as $video) {
$index++;
if ($index < $startIndex || $index > $startIndex + PER_PAGE_COUNT - 1) continue;
$video = explode("/", $video);
$video = $video[sizeof($video)-1];
$search = array('.mp4', '.mkv', 'x264', '.GerSub','.1080p','.v2','.WebRip','_1280x720','.avi','.webm');
$replace = array('', '', '');
$str = str_replace($search, $replace, $video);
$str = str_replace(".", " ", $str);
?> 
            <div class="col s12 m6">
          <div class="card">
<div class="card-image">
                        <video id="video" class="z-depth-1 video-js vjs-default-skin vjs-16-9 vjs-big-play-centered img" controls preload="metadate" width="100%" data-setup="{}">
    <source src="<?= $convertedLocation ?><?= $video ?>" type='video/mp4'></video></div>
<div class="card-content">
<p class="h6-text" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;"><?= $str ?></p><br>
<i class="fa fa-download fa-2x">&nbsp;</i><a class="color-primary-text download-text" href="<?= $convertedLocation ?><?= $video ?>">Download</a></div>
  <div class="section"></div></div>
        </div>

<?php } ?>
        </div>
            <div class="row">
<ul class="pagination">
<?php for ($i = 0;$i<sizeof($videos)/PER_PAGE_COUNT;$i++) { ?>
<li class="<?= $i == $_GET["v"] ? "active" : "waves-effect" ?>"><a href="./index.php?page=uploads&v=<?= $i ?>#show"><?= ($i+1) ?></a></li>
<?php } ?>
</ul>
        </div>
  <div class="section"></div>

</section>
