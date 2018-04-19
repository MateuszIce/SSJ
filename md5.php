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
        
        <form method="post">
   <input type="text" placeholder="hasło" name="hasloo"/>
            </form>
<?php
        
    if(isset($_POST['hasloo']))
    {
    $hasloo = $_POST['hasloo'];
        
    $szyfr = md5($hasloo);
    echo $szyfr;
    }
?>
   
   
   
    </div>    
     </div>
    <?php 
        $name = basename(__FILE__);
        include 'footer.php';
    ?> 


</body>

</html>