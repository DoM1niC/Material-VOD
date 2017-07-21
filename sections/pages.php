<?php
$page = "Index";
if (isset($_GET["page"]))
  $page = $_GET["page"];

if ($page == "welcome")
  include ("sections/welcome.php");
else if ($page == "uploads")
  include ("sections/uploads.php");
else if ($page == "upload")
  include ("sections/upload.php");
else if ($page == "stream")
  include ("sections/stream.php");
?>