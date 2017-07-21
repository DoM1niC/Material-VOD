<?php
//-----------------------------------------------------
// General Settings
//-----------------------------------------------------

 $maxFileSize 		= 999999999999999999999999999;
 $allowedMimeTypes 	= array('video/avi','video/mp4','video/mpeg','video/quicktime','video/x-msvideo','video/msvideo','video/x-ms-wmv','video/x-matroska');

//-----------------------------------------------------
// SSH Settings
//-----------------------------------------------------

 $sshIP	 		= '127.0.0.1';
 $sshUser		= 'root';
 $sshPW	 		= 'yourPW';

 $sshIPRTMP		= 'rtmpserveradresse';
 $sshUserRTMP		= 'root';
 $sshPWRTMP		= 'yourPW';

//-----------------------------------------------------
// Path Settings
//-----------------------------------------------------

 $uploadLocation 	= 'content/vod/uploads/';
 $convertedLocation 	= 'content/vod/converted/';
 $convertedLocationFull = '/home/www/vod/content/vod/converted/';
 $downloadLocation 	= '/home/www/vod/content/vod/downloads/';

//-----------------------------------------------------
// Command Settings
//-----------------------------------------------------

 $ffmpegCommand 	= 'screen -d -S convert-upload -m ffmpeg'; 
 $ffmpegCommandFull 	= '/usr/bin/ffmpeg'; 
 $ScreenCommand 	= '/usr/bin/screen'; 
 $youtubedlCommand 	= '/root/youtube-dl/bin/youtube-dl';

//-----------------------------------------------------
// Stream Settings
//-----------------------------------------------------

 $streamHDURL	 	= 'https://rtmp.dom1nic.eu:8081/hd/stream/index.m3u8';
 $streamSDURL	 	= 'https://rtmp.dom1nic.eu:8081/sd/stream/index.m3u8';
 $streamChatURL	 	= 'https://livechat.dom1nic.eu/dom1nic';
 $VisitorCountPort	 = '8081';
 $VisitorSSHServer	 = 'rtmp';
?>