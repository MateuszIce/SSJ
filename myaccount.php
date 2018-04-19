<?php

 session_start();

require_once "connect.php";
        
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    
    if($polaczenie->connect_errno!=0)
    {
      echo "Connection Error: ".$polaczenie->connect_errno;
    }
    
        if(isset($_COOKIE['id'])){
            $id = mysqli_real_escape_string($polaczenie, $_COOKIE['id']);
            $REMOTE_ADDR = mysqli_real_escape_string($polaczenie, $_SERVER['REMOTE_ADDR']);
            $HTTP_USER_AGENT = mysqli_real_escape_string($polaczenie, $_SERVER['HTTP_USER_AGENT']);
            $q = mysqli_fetch_assoc(mysqli_query($polaczenie, "select id_user from sesja where id = '$id' and web = '$HTTP_USER_AGENT' and ip = '$REMOTE_ADDR';"));
            if(!empty($q['id_user'])){
                $logged = true;
            }
            else{
                setcookie("id",0,time()-1);            
                unset($_COOKIE['id']);
                header('Location: login.php');
                $logged = false;
            
            }
            
        }
        else{
            $logged = false;
           
        }
?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>SuperSaiyan</title>
    <meta name="author" content="Mateusz Ciałowicz"/>
	<meta name="description" content="Trening, dieta, odżywki" />
	<meta name="keywords" content="trener, trening, dieta, personalny" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/style.css"/>
	<link rel="Shortcut icon" href="img/top_icon.ico" />
	
<!--[if lt IE 9]>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<![endif]-->

</head>


<body>
    <div id="container">


    <div id="top_bar">
    
    <?php 
        $name = basename(__FILE__);
        include 'navbarlog.php';
    ?>
    </div>
    
    <div id="content">

   <?php
        echo "<p>Witaj przybyszu jeszcze nie wiem ktoś ty ale kuwa sie dowiem!";

       

    ?>
   
   
   
    </div>    
     </div>
    <?php 
        $name = basename(__FILE__);
        include 'footer.php';
    ?> 


</body>

</html>