<?php
function write_session(){
	$_SESSION['authentication_pass']="pass";
}

function destroy_session(){
	unset($_SESSION['authentication_pass']);
}

function is_user_authentic(){
	if($_SESSION['authentication_pass']=="pass"){
		return true;
	}else{
		return false;
	}
}
?>
