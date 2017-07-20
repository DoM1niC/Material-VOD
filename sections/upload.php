<section class="padding" >
        <div id="show" class="container scrollspy">
		<div class="section"></div>

            <div class="row">
	<h2>Upload Manager</h2>
		<div class="section"></div>
	<?php include("upload/upload_form.php"); ?>
	<?php include("upload/download_form.php"); ?>
	<!-- Show Videos to Convert -->
      <?php include("upload/download_show.php"); ?> 
	<!-- Show Uploads to Delete -->
      <?php include("upload/upload_show.php"); ?> 
	<!-- Show Supported Sites -->
      <?php include("upload/download_supported.php"); ?> 
        </div>
        </div>
		<div class="section"></div>
		<div class="section"></div>
</section>

<?php
if (isset($_POST["action"])) {
 $action = strtolower($_POST["action"]);
 if ($action == "download") {
    $name = $_POST['name'];
    $url = $_POST['url'];
    $ssh->exec("$ScreenCommand -d -S voddl -m $youtubedlCommand --audio-format 0 --audio-quality 0 --add-metadata --prefer-ffmpeg --ffmpeg-location $ffmpegCommandFull -o '$downloadLocation$name' $url");
sleep(5);
header("Location: index.php".(isset($_GET["page"])?"?page=".$_GET["page"]:""));
 }

if (isset($_POST["convertcheck"]) && $action == "convert") {
	foreach($_POST["convertcheck"] as $video) {
	$search = array($downloadLocation);
	$replace = array('', '', '');
	$str = str_replace($search, $replace, $video);
function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}
if (endsWith($str, ".mp4") || endsWith($str, ".webm")) {
$ssh->exec("mv '$downloadLocation$str' '$convertedLocationFull$str'");
sleep(2);
header("Location: index.php".(isset($_GET["page"])?"?page=".$_GET["page"]:""));
} else 
$ssh->exec("$ScreenCommand -d -S youtube-dl-ffmpeg -m ffmpeg -i '$downloadLocation$str' -vcodec h264 -acodec aac -strict -2 '$convertedLocationFull$str.mp4'");
	} 
sleep(2);
header("Location: index.php".(isset($_GET["page"])?"?page=".$_GET["page"]:""));

	} 
if (isset($_POST["uploadcheck"])) {
	foreach($_POST["uploadcheck"] as $video2) {
$search2 = array($convertedLocation);
$replace2 = array('', '', '');
$str2 = str_replace($search2, $replace2, $video2);
             $ssh->exec("rm '$convertedLocationFull$str2'");
        }
sleep(1);
header("Location: index.php".(isset($_GET["page"])?"?page=".$_GET["page"]:""));
 }
	} 

?>