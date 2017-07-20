     <div class="col m6">	
    <div class="card">
    <div class="card-content">
<h5>Video Downloaden</h5>

    <form method="post"> 
    <div class="input-field">
        <input id="name" name="name" validate required type="text">
        <label for="name">Name</label>
    </div>
    <div class="input-field">
        <input id="url" required  name="url" validate type="text">
        <label for="url">URL (YouTube / Clipfish usw.) <a class="fa-lg fa fa-info-circle" data-target="download_supported"></a></label>

    </div>
		<div class="section"></div>
		<button id="download" class="submit btn btn-default indigo darken-2" type="submit" name="action" value="download">Downloaden</button> 
		<button data-target="download_show" class="btn indigo darken-2">Konvertieren</button>
</form>
<br>
    <form method="post"> 
<?php
$filesize = 0;
foreach(glob($downloadLocation."*") as $file) $filesize += filesize($file);
$filesize /= 1024.0 * 1024.0 * 1024.0;
$filesize = round($filesize*100)/100.0;
if (isset($_POST["action"]) && $_POST["action"] == "cleanup_downloads") {
  foreach(glob($downloadLocation."*") as $file) unlink($file);
header("Location: index.php".(isset($_GET["page"])?"?page=".$_GET["page"]:""));
}
?>
<button id="upload" class="btn btn-default red" type="submit" name="action" value="cleanup_downloads">Downloads bereinigen (<?= $filesize ?> GB)</button>
</form>

<?php
  $command = "$ScreenCommand -list | grep youtube-dl-ffmpeg";
  if ($command) 
  {
  $stream2 = $ssh->exec($command);
  }
  $streamX = $stream2 ? true : false;
  $count2 = $ssh->exec("$ScreenCommand -list | grep youtube-dl-ffmpeg -o  | wc -w");
  if($stream2) 
  {
  echo "<br></br><div class='waves-effect waves-light btn orange'>
<h6>Aktive Konvertierung:$count2</h6></div>";
  }
  else 
  {
  }
  ?>  
<?php
  $command = "$ScreenCommand -list | grep voddl";
  if ($command) 
  {
  $stream = $ssh->exec($command);
  }
$streamX = $stream ? true : false;
$count = $ssh->exec("$ScreenCommand -list | grep voddl -o  | wc -w");
  if($stream) 
  {
  echo "<br></br><div class='waves-effect waves-light btn orange'>
<h6>Aktive Downloads:$count</h6></div>";
  }
  else 
  {
  }
  ?>  
</div> 
</div>  
    </div>


