<?php 
 require_once "../sections/config.php";
 require_once "ssh/$VisitorSSHServer.php";
?>
<?php
$output= $ssh->exec("netstat -anp | grep -c -i :$VisitorCountPort");
print $output;
?>