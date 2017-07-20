<?php
//-----------------------------------------------------
// General Settings
//-----------------------------------------------------

 $maxFileSize 		= 999999999999999999999999999;
 $allowedMimeTypes 	= array('video/avi','video/mp4','video/mpeg','video/quicktime','video/x-msvideo','video/msvideo','video/x-ms-wmv','video/x-matroska');

//-----------------------------------------------------
// Path Settings
//-----------------------------------------------------

 $uploadLocation 	= 'content/vod/uploads/';
 $convertedLocation 	= 'content/vod/converted/';
 $convertedLocationFull = '/home/storage2/vod/converted/';
 $downloadLocation 	= '/home/storage2/vod/downloads/';

//-----------------------------------------------------
// Command Settings
//-----------------------------------------------------

 $ffmpegCommand 	= 'screen -d -S convert-upload -m ffmpeg'; 
 $ffmpegCommandFull 	= '/usr/bin/ffmpeg'; 
 $ScreenCommand 	= '/usr/bin/screen'; 
 $youtubedlCommand 	= '/root/youtube-dl/bin/youtube-dl';
?>