<?php
$page = "Index";
if (isset($_GET["page"]))
  $page = $_GET["page"];

if ($page == "stream" && ((!is_array($PERMS) && $PERMS === true) || (is_array($PERMS) && in_array("stream", $PERMS))))
  include ("sections/stream.php");
else if ($page == "welcome" && ((!is_array($PERMS) && $PERMS === true) || (is_array($PERMS) && in_array("welcome", $PERMS))))
  include ("sections/welcome.php");
else if ($page == "uploads" && ((!is_array($PERMS) && $PERMS === true) || (is_array($PERMS) && in_array("uploads", $PERMS))))
  include ("sections/uploads.php");
else if ($page == "upload" && ((!is_array($PERMS) && $PERMS === true) || (is_array($PERMS) && in_array("upload", $PERMS))))
  include ("sections/upload.php");
else if ($page == "videos" && ((!is_array($PERMS) && $PERMS === true) || (is_array($PERMS) && in_array("videos", $PERMS))))
  include ("sections/videos.php");
else {
  include ("includes/403.php");
}
?>