<?php
//-----------------------------------------------------
// Allgemeine Einstellung
//-----------------------------------------------------

 $maxFileSize 		= 999999999999999999999999999;
 $allowedMimeTypes 	= array('video/avi','video/mp4','video/mpeg','video/quicktime','video/x-msvideo','video/msvideo','video/x-ms-wmv','video/x-matroska');

//-----------------------------------------------------
// Lokale SSH Verbindung
//-----------------------------------------------------

 $sshIP	 		= '127.0.0.1';
 $sshUser		= 'root';
 $sshPW	 		= 'yourPW';

//-----------------------------------------------------
// Pfade
//-----------------------------------------------------

 $uploadLocation 	= 'content/vod/uploads/'; 				// Hochgeladene Uploads mit relativen Webpfad
 $convertedLocation 	= 'content/vod/converted/';				// Hochgeladene konvertierte Uploads mit relativen Webpfad
 $convertedLocationFull = '/home/www/vod/content/vod/converted/'; 		// Hochgeladene konvertierte Uploads mit vollen Pfad
 $downloadLocation 	= '/home/www/vod/content/vod/downloads/';		// Heruntergeladene Video's mit vollen Pfad

//-----------------------------------------------------
// Kommando's
//-----------------------------------------------------

 $ffmpegCommand 	= 'screen -d -S convert-upload -m ffmpeg'; 	
 $ffmpegCommandFull 	= '/usr/bin/ffmpeg'; 					// FFMPEG 	    (apt-get install ffmpeg)
 $ScreenCommand 	= '/usr/bin/screen'; 					// Screen Dienst    (apt-get install screen)
 $youtubedlCommand 	= '/root/youtube-dl/bin/youtube-dl';			// youtube-dl 	    (apt-get install youtube-dl)

//-----------------------------------------------------
// Stream Einstellungen
//-----------------------------------------------------

 $streamUSE	 	= false; 						// Stream in Navigation				
 $streamHDURL	 	= 'https://rtmp.dom1nic.eu:8081/hd/stream/index.m3u8';	// HLS URL zum HD Format
 $streamSDURL	 	= 'https://rtmp.dom1nic.eu:8081/sd/stream/index.m3u8';	// HLS URL zum SD Format
 $streamChatURL	 	= 'https://livechat.dom1nic.eu/dom1nic';		// Privat Chat oder Twitch Chat einbinden
 $VisitorCountPort	= '8081';						// HLS Webport um Zuschauer anzeigen zu lassen
 $VisitorSSHServer	= 'rtmp'; 						// rtmp für SSH RTMP oder localhost SSH	

// SSH RTMP Verbindung (externer Server mit NGINX RTMP)

 $sshIPRTMP		= 'rtmpserveradresse';
 $sshUserRTMP		= 'root';
 $sshPWRTMP		= 'yourPW';

?>