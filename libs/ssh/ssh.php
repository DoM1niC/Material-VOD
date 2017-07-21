<?php
	set_include_path(__DIR__);
	
	require "Net/SSH2.php";
 	require_once "././sections/config.php";

	$ssh = new Net_SSH2($sshIP);
	if (!$ssh->login($sshUser, $sshPW)) exit("Login failed");
?>