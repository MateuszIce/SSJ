<?php

	session_start();

	$q = mysqli_query($polaczenie, "delete from sesja where id = '$_COOKIE[id]' and web = '$_SERVER[HTTP_USER_AGENT]';");
                setcookie("id",0,time()-1);
                unset($_COOKIE['id']);

	session_unset();
	
	header('Location: index.php');

?>