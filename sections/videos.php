<?php
$filesize = 0;
foreach(glob($convertedLocation. $category[$_GET["cat"]] . "/"."*") as $file) $filesize += filesize($file);
$filesize /= 1024.0 * 1024.0 * 1024.0;
$filesize = round($filesize*100)/100.0;
$videos = glob($convertedLocation . $category[$_GET["cat"]] . "/" . '*.{[mM][pP]4,[wW][eE][bB][mM]}', GLOB_BRACE);
if (sizeof($videos) != 0) {
?>
<section class="padding scrollspy" >
        <div id="show" class="container scrollspy">
            <div class="row">
    <div class="col s12 m9 l10">
                    <h4><?= $_GET["cat"] ?> (<?= $filesize ?> GB)</h4>
                </div>
            </div> 
            <div class="row">
               <?php
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
    <source src="<?= $convertedLocation ?><?= $category[$_GET["cat"]] ?>/<?= $video ?>"><?= $video ?>" type='video/mp4'></video></div>
<div class="card-content">
<p class="h6-text" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;"><?= $str ?></p><br>
<a data-target="<?= $str ?>" class="fa-x2 fa fa-expand download-text right"></a>
<div class="left"><a class="fa fa-download fa-x2 download-text" download href="<?= $convertedLocation ?><?= $category[$_GET["cat"]] ?>/<?= $video ?>"></a>&nbsp;|&nbsp;</div>
<a data-clipboard-text="<?= $url ?><?= $uri ?>#<?= $str ?>" data-clipboard-action="copy" onclick="Materialize.toast('Link kopiert!', 4000)" class="copy fa fa-link download-text"></a>
      <?php include("full.php"); ?> 
</div>
  <div class="section"></div></div>
        </div>
<?php } ?>
        </div>
            <div class="row">
<ul class="pagination">
<?php for ($i = 0;$i<sizeof($videos)/PER_PAGE_COUNT;$i++) { ?>
<li class="<?= $i == $_GET["v"] ? "active" : "waves-effect" ?>"><a href="./index.php?page=videos&cat=<?= $_GET["cat"] ?>&v=<?= $i ?>#show"><?= ($i+1) ?></a></li>
<?php } ?>
</ul>
        </div>
  <div class="section"></div>
</section>
    <!-- Table of Contents -->
    <div class="col hide-on-small-only m4 padding2">
    <div class="toc-wrapper">
          <ul class="section table-of-contents">
<li><b>Kategorie</b></li>
<?php foreach($category as $name => $x) { ?>
        <li><a href="./index.php?page=videos&cat=<?= $name ?>#show"><?= $name ?></a></li>
<?php } ?> 
          </ul>
    </div>

      </div>
    </div>
    <script>
    var clipboard = new Clipboard('.copy');
    </script>
<script>

$(document).ready(function() {
  $(".modal.permalink").each(function(){
    if(window.location.href.indexOf($(this).attr("id")) != -1){
      $(this).modal('open');
    }
  });
$(".close").click(function() {
  $('.modal').modal('close');
$("video").each(function () { this.pause(); });
});
});
</script>
<?php
}?>
