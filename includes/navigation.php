<?php
 require_once "sections/config.php";
$variable = $streamUSE;
if($variable === true)
  {
  $streamE = $variable;
  }
?>
	<form action="." method="post">	
	<input name="auth_act" value="logout" type="hidden"><a class="button-collapse right" onclick="document.forms[0].submit();return false;"><i class="fa-white material-icons">input</i></a>      
	<a href="#" data-activates="slide" class="button-collapse"><i class="fa-white material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="h5-text" href="index.php?page=welcome"><i class="fa fa-white fa-home fa-1x" aria-hidden="true"></i>&nbsp; Startseite</a></li>
       <?php if ((!is_array($PERMS) && $PERMS === true) || (is_array($PERMS) && in_array("upload", $PERMS))) { ?><li><a class="h5-text" href="index.php?page=upload"><i class="fa fa-white fa-upload fa-1x" aria-hidden="true"></i>&nbsp; Hochladen</a></li><?php } ?>
        <?php if ((!is_array($PERMS) && $PERMS === true) || (is_array($PERMS) && in_array("videos", $PERMS))) { ?><li><a class="h5-text" href="index.php?page=videos&cat=Uploads#show"><i class="fa fa-white fa-file-video-o fa-1x" aria-hidden="true"></i>&nbsp; Videos</a></li><?php } ?>
        <?php if ((!is_array($PERMS) && $PERMS === true) || (is_array($PERMS) && in_array("stream", $PERMS))) { ?><li class="<?=(!$streamE)?"hide":""?>"><a class="h5-text" href="index.php?page=stream"><i class="fa fa-white fa-video-camera fa-1x" aria-hidden="true"></i>&nbsp; Stream</a></li><?php } ?>
        <li><a onClick="history.go(0)"><i class="fa-white material-icons">refresh</i></a></li>
	<li><input name="auth_act" value="logout" type="hidden"><a onclick="document.forms[0].submit();return false;"><i class="fa-white material-icons">input</i></a></li>
</form>
      </ul>
  <ul id="slide" class="side-nav">
    <li><a class="subheader">Menü</a></li>
       <?php if ((!is_array($PERMS) && $PERMS === true) || (is_array($PERMS) && in_array("welcome", $PERMS))) { ?><li><a class="waves-effect" href="index.php?page=welcome"><i class="fa fa-white fa-home fa-1x" aria-hidden="true"></i>&nbsp; Startseite</a></li><?php } ?>
        <?php if ((!is_array($PERMS) && $PERMS === true) || (is_array($PERMS) && in_array("upload", $PERMS))) { ?><li><a class="waves-effect" href="index.php?page=upload"><i class="fa fa-white fa-upload fa-1x" aria-hidden="true"></i>&nbsp; Hochladen</a></li><?php } ?>
        <?php if ((!is_array($PERMS) && $PERMS === true) || (is_array($PERMS) && in_array("videos", $PERMS))) { ?><li><a class="waves-effect dropdown-button" href="#!" data-activates="cat"><i class="fa fa-white fa-file-video-o fa-1x" aria-hidden="true"></i>&nbsp; Video's</a></li>
      <ul id='cat' class='dropdown-content'>
	<?php foreach($category as $name => $x) { ?>
        <li><a href="./index.php?page=videos&cat=<?= $name ?>#show"><?= $name ?></a></li>
	<?php } ?> 
          </ul><?php } ?>
        <?php if ((!is_array($PERMS) && $PERMS === true) || (is_array($PERMS) && in_array("stream", $PERMS))) { ?><li class="<?=(!$streamE)?"hide":""?>"><a class="waves-effect" href="index.php?page=stream"><i class="fa fa-white fa-video-camera fa-1x"></i>&nbsp; Stream</a></li><?php } ?>    <div>

      </ul>
