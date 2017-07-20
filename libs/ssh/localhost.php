<?php
	set_include_path(__DIR__);
	
	require "Net/SSH2.php";
	
	$ssh = new Net_SSH2("127.0.0.1");
	if (!$ssh->login("root", "myrootpw")) exit("Login failed");
?>