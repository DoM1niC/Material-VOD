<?php
session_start();
ob_start();

$users = json_decode(file_get_contents("sections/users.json"), true);

if (isset($_POST["auth_act"])) {
 if ($_POST["auth_act"] == "login") {
  foreach($users as $user) {
   if ($user["username"] == $_POST["username"] && $user["password"] == $_POST["password"]) {
    $_SESSION["vod"] = $_POST["username"];
    header("location: .");
    exit;
   }
  }
 } else if ($_POST["auth_act"] == "logout") {
  unset($_SESSION["vod"]);
  header("location: .");
  exit;
 }
}

if (!isset($_SESSION["vod"])) { 
?>
<?php include("includes/login.php"); ?>
<?php } else { ?>
      <?php include("includes/page.php"); ?>
<?php } ob_end_flush();?>