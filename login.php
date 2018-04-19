<?php

    session_start();

    if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']=true))
    {
        header('Location: myaccount.php');
        exit();
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
    <link rel="Shortcut icon" href="img/top_icon.ico" />
	<link rel="stylesheet" href="style/style.css" type="text/css" />
	<link rel="stylesheet" href="style/style_log.css" type="text/css" />
	
	
	
</head>

<body>
<div id="container">

	<div id="logbox"> 
	
	<div id="top_bar">
    
    <?php 
        $name = basename(__FILE__);
        include 'navbar.php';
    ?>
    </div>
    
		<form method="post" action="logged.php">
            <?php
                if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
            ?>
			<input type="text" placeholder="login" name="login"/>
			<input type="password" placeholder="hasło" name="haslo"/>
	

			<input type="submit"value="Zaloguj się!" />
			
			
			<a href="register.php">Nie masz jeszcze konta? Zarejestruj się!</a>
			
		</form>
	</div>
	</div>
	    <?php 
        $name = basename(__FILE__);
        include 'footer.php';
    ?> 


</body>
</html>