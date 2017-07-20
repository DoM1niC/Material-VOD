<?php
$error 				= false;
$uploadSuccess 		= false;
$stillImages		= false;
$renderHTML5 		= false;

$newline 			= "\n";
$fileSplit 			= '_';
$timeStamp 			= time();
$filePath 			= realpath('./').'/';


if (isset($_FILES) && $_FILES) {

	// Custom Settings

	// Video
	$videoSize 			= isset($_POST['video_size']) 					? $_POST['video_size'] 		: '640x360';
	$videoBitrate 		= isset($_POST['video_bitrate'])				? (int)$_POST['video_bitrate'] 	: '700';
	$videoFramerate		= isset($_POST['video_framerate'])				? (int)$_POST['video_framerate'] : '30';
	$videoDeinterlace	= isset($_POST['encoding_video_deinterlace'])	? 1 : 0 ;

	// Adudio
	$audioEnabled		= isset($_POST['encoding_enable_audio'])		? 1 : 0 ;
	$audioSamplerate	= isset($_POST['encoding_audio_sampling_rate'])	? (int)$_POST['encoding_audio_sampling_rate'] : '44100';
	$audioBitrate		= isset($_POST['encoding_audio_bitrate'])		? (int)$_POST['encoding_audio_bitrate'] : '128';
	$audioChannels		= (isset($_POST['encoding_audio_channels']) && $_POST['encoding_audio_channels']	== 'stereo')	? 2 : 1 ;

	// Build up the ffmpeg params from the values posted from the html form
	$customParams  = ' -s '.$videoSize; 				// Format the video size
	$customParams .= ' -b:v '.$videoBitrate.'k'; 		// Format the video bit rate
	$customParams .= ' -r '.$videoFramerate;			// Format the video frame rate

	if ($videoDeinterlace) {
		$customParams .= ' -deinterlace ';				// Deinterlace the video
	}
	if ($audioEnabled) {
		$customParams .= ' -ar '.$audioSamplerate;		// Audio sample rate
		$customParams .= ' -ab '.$audioBitrate.'k';		// Audio bit rate
		$customParams .= ' -ac '.$audioChannels;		// Audio Channels
	}
	else
	{
		$customParams .= ' -an '; 						// Disable audio
	}
	$customParams .= ' -y ';							// Overwrite existing file


	// Check the uploaded mime type
	if (in_array($_FILES["file"]["type"],$allowedMimeTypes ))
	{
		// Check the uploaded file size 
		if ($_FILES["file"]["size"] < $maxFileSize || $maxFileSize == 0) {
		
			if ($_FILES["file"]["error"] > 0)
			{
				$error =  "Return Code: " . $_FILES["file"]["error"];
			}
			else
			{
				$uploadSuccess  = "<button class='btn btn-default green'>Upload erfolgreich</button>";
				$uploadedFilename = $_FILES["file"]["name"];


				if (file_exists($uploadLocation . $uploadedFilename))
				{
					$error = "<button class='btn btn-default red'>Datei existiert bereits!</button><br></br>";
				}
				else
				{

					move_uploaded_file($_FILES["file"]["tmp_name"],$uploadLocation . $uploadedFilename);
					$uploadSuccess .= "<br></br><button class='btn btn-default orange'>Convertierung läuft!</button>";

					$file_uploaded = $uploadLocation . $uploadedFilename;
					$source_ext = pathinfo($uploadedFilename, PATHINFO_EXTENSION);



					// Mp4 x264
					if (isset($_POST['encoding_x264'])) {


						$command = $ffmpegCommand.' -i '.$filePath.$file_uploaded.' -vcodec h264';
						if ($audioEnabled) {
							$command = $command.' -acodec aac -strict -2';
						}
						$command = $command.$customParams.'  '.$filePath.$convertedLocation.$uploadedFilename.'.mp4  2>&1';
						$ssh->exec($command, $output, $status);
						$output = 'File: '.$file_uploaded."\n".implode("\n", $output);

					}

					// Webm file
					if (isset($_POST['encoding_webm'])) {
						$command = $ffmpegCommand.' -i '.$filePath.$file_uploaded.$customParams.$filePath.$convertedLocation.$uploadedFilename.'.webm  2>&1';
						$ssh->exec($command, $output, $status);
						$output = 'File: '.$file_uploaded."\n".implode("\n", $output);
					}

					// Screen shots
					if (isset($_POST['encoding_stills'])) {
						$command = $ffmpegCommand.' -i '.$filePath.$file_uploaded.' -s '.$videoSize.' -r 1 -vframes 5 -ss 00:01 -y '.$filePath.$convertedLocation.$uploadedFilename.'_stills_%d.png  2>&1';
						$ssh->exec($command, $output, $status);
						$output = 'File: '.$file_uploaded."\n".implode("\n", $output);

					}

					// Check if we can render the html5 player html
					if (isset($_POST['encoding_x264']) && isset($_POST['encoding_ogv']) && isset($_POST['encoding_webm']) && isset($_POST['encoding_stills'])) {
						$renderHTML5 = false;
					}
				}
			}
		}
		else
		{
		$error = "<button class='btn btn-default red'>Datei ist zu gro�!</button><br></br>";
		}
	}
	else
	{
		$error = "<button class='btn btn-default red'>Datei ist kein Video!</button><br></br>";
	}
}
?>	
                <div class="col m6">	
    <div class="card">
    <div class="card-content">
<h5>Video Hochladen</h5>
<?php
  $command = "$ScreenCommand -list | grep convert-upload";
  if ($command) 
  {
  $stream = $ssh->exec($command);
  }
$streamX = $stream ? true : false;
$count = $ssh->exec("$ScreenCommand -list | grep convert-upload -o  | wc -w");
  if($stream) 
  {
  echo "<br></br><div class='waves-effect waves-light btn orange'>
<h6>Aktive Konvertierung:$count</h6></div>";
  }
  else 
  {
  }
  ?>  
		<div class="section"></div>
		<button data-target="upload_show" class="btn indigo darken-2">Verwalten</button>
	<form id="uploadForm" action="" method="post" enctype="multipart/form-data">
    <div class="file-field input-field">
      <div class="btn indigo darken-2">
        <span>Video Datei</span>
        <input id="file" name="file" required  validate type="file" accept="video/*,.mkv">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
		</div>    </div>
		<div class="section"></div>

		<div class="input-field">
			<select name="video_size">
				<option value="3840x2160">2160p</option>
				<option value="2560x1440">1440p</option>
				<option value="1920x1080">1080p</option>
				<option selected="selected" value="1280x720">720p</option>
				<option value="854x480">480p</option>
				<option value="640x360">360p</option>
				<option value="426x240">240p</option>

			</select>
			<label for="video_size">Video Auflösung:</label> 
		</div>


		<div class="input-field">
			<select name="video_bitrate">
				<option value="53000">53000 kbit/s (2160p 60 FPS)</option>
				<option value="35000">35000 kbit/s (2160p 30 FPS)</option>
				<option value="24000">24000 kbit/s (1440p 60 FPS)</option>
				<option value="16000">16000 kbit/s (1440p 30 FPS)</option>
				<option value="12000">12000 kbit/s (1080p 60 FPS)</option>
				<option value="8000">8000 kbit/s (1080p 30 FPS)</option>
				<option value="7500">7500 kbit/s (720p 60 FPS)</option>
				<option value="5000">5000 kbit/s (720p 30 FPS)</option>
				<option value="4000">4000 kbit/s (460p 60 FPS)</option>
				<option selected="selected" value="2500">2500 kbit/s (480p 30 FPS)</option>
				<option value="1500">1500 kbit/s (360p 60 FPS)</option>
				<option value="1000">1000 kbit/s (360p 30 FPS)</option>
			</select>
			<label for="video_bitrate">Video Bitrate:</label> 
		</div>

		<div class="input-field">
			<select name="video_framerate">
				<option value="60">60</option>
				<option value="50">50</option>
				<option value="30" selected="selected">30</option>
				<option value="25">25</option>
			</select>
			<label for="video_framerate">FPS:</label>

		</div>

		<div class="input-field">
			<input id="encoding_video_deinterlace" type="checkbox" name="encoding_video_deinterlace" />
			<label for="encoding_video_deinterlace">Deinterlace</label>

		</div>


		<div class="input-field">
			<input type="checkbox" id="encoding_enable_audio" name="encoding_enable_audio" checked="checked" />
			<label for="encoding_enable_audio">Ton</label>
		</div>

		<div class="section"></div>

		<div class="input-field">
			<select name="encoding_audio_sampling_rate">
				<option value="48000" selected="selected">48000 Mz</option>
			</select>
			<label for="encoding_audio_sampling_rate">Ton Samplingrate (Hz):</label>
		</div>

		<div class="input-field">
			<select name="encoding_audio_bitrate">
				<option value="512">512 kbit/s (5.1)</option>
				<option value="256">384 kbit/s</option>
				<option value="128" selected="selected">128 kbit/s</option>
			</select>
			<label for="file">Ton Bitrate (kbit/s):</label>
		</div>

		<div class=" hide input-field">
			<input type="radio" id="encoding_audio_channels" name="encoding_audio_channels" checked="checked" value="stereo" />
			<label for="encoding_audio_channels">Stereo</label>
			<input type="radio" id="encoding_audio_channels" name="encoding_audio_channels" value="mono"/>
			<label for="encoding_audio_channels">Mono</label>
		</div>
		<div class="section"></div>

		<h3>Ausgabe</h3>
		<div class="input-field">
			<input type="checkbox" id="encoding_x264" name="encoding_x264" checked="checked" />
			<label for="encoding_x264">H264 (MP4) </label>
		</div>

		<div class="input-field">
			<input type="checkbox" id="encoding_webm" name="encoding_webm" />
			<label for="encoding_webm">webm</label>
		</div>
		<div class="input-field">
			<input type="checkbox" id="encoding_stills" name="encoding_stills" />
			<label for="encoding_stills">Screenshots erstellen</label>

		</div>
<?php
$filesize = 0;
foreach(glob($uploadLocation."*") as $file) $filesize += filesize($file);
$filesize /= 1024.0 * 1024.0 * 1024.0;
$filesize = round($filesize*100)/100.0;
if (isset($_POST["action"]) && $_POST["action"] == "cleanup_uploads") {
  foreach(glob($uploadLocation."*") as $file) unlink($file);
header("Location: index.php".(isset($_GET["page"])?"?page=".$_GET["page"]:""));
}
?>
		<div class="section"></div>
		<button id="upload" class="btn btn-default indigo darken-2" type="submit" name="submit" value="Upload and convert">Hochladen & Konvertieren</button>
		</form>
<br>

	<form action="" method="post">
<button id="upload" class="btn btn-default red" type="submit" name="action" value="cleanup_uploads">Uploads bereinigen (<?= $filesize ?> GB)</button>
</form>
<div class="progress indigo darken-2" style="width:60%">
    <div class="indigo lighten-2 determinate" ></div>
    <div class="percent" >0%</div>

<div id="status"></div>
</div>
          </div>        
</div>  
</div>  