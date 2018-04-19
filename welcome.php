

<?php
    
    session_start();
    if(!isset($_SESSION['udanarejestracja']))
    {
        header('Location: index.php');
        exit();
    }
    else
    {
        unset($_SESSION['udanarejestracja']);
    }

    //kasujemy zepamietane dane gdy rejestracja powiodla sie

    if(isset($_SESSION['fr_imie'])) unset($_SESSION['fr_imie']);
    if(isset($_SESSION['fr_nazwisko'])) unset($_SESSION['fr_nazwisko']);
    if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
    if(isset($_SESSION['fr_login'])) unset($_SESSION['fr_login']);
    if(isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);
    
    //usuwanie zmiennych sesyjnych z errorami
    if(isset($_SESSION['e_imie'])) unset($_SESSION['e_imie']);
    if(isset($_SESSION['e_nazwisko'])) unset($_SESSION['e_nazwisko']);
    if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
    if(isset($_SESSION['e_login'])) unset($_SESSION['e_login']);
    if(isset($_SESSION['e_password'])) unset($_SESSION['e_password']);
    if(isset($_SESSION['e_repassword'])) unset($_SESSION['e_repassword']);
    if(isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);

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
        include 'navbar.php';
    ?>
    </div>
    
    <div id="content">

   WELCOME ZAOGUJ SIEM
   
   
   
    </div>    
     </div>
    <?php 
        $name = basename(__FILE__);
        include 'footer.php';
    ?> 


</body>

</html>