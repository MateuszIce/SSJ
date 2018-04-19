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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

	
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
    
<div id="choose">
       <h12>Jaki jest Twój cel?</h12>
       <br><br>
        <form method="POST" action="index.php">
            <input type="radio" name="target" value="masa"> <label>Przypakować&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" name="target" value="rzezba"> <label>Schudnąć&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" name="target" value="chudnac"> <label>Wyrzeźbić</label>
     

        <br><br>
        
     
            <div class="opszyns">ABONAMENT</div><div class="opszyns">DIETA</div><div class="opszyns"> TRENING </div><div class="opszyns">DIETA+TRENING</div><br>
            <div class="abo">3 miesięczny&nbsp; &nbsp;&nbsp;&nbsp;</div> <span><input type="radio" name="whatis" value="3d"> 159,99 zł</span>
            <span><input type="radio" name="whatis" value="3t"> 139,99 zł</span>
            <span><input type="radio" name="whatis" value="3dt"> 189,99 zł</span>
        <br><br>
            <div class="abo">6 miesięczny &nbsp; &nbsp;&nbsp;&nbsp;</div>   <span><input type="radio" name="whatis" value="6d"> 249,99 zł</span>
            <span><input type="radio" name="whatis" value="6t"> 199,99 zł</span>
            <span><input type="radio" name="whatis" value="6dt"> 299,99 zł</span>
        <br><br>
            <div class="abo">12 miesięczny &nbsp; &nbsp;&nbsp;&nbsp; </div>  <span><input type="radio" name="whatis" value="12d"> 399,99 zł</span>
            <span><input type="radio" name="whatis" value="12t"> 349,99 zł</span>
            <span><input type="radio" name="whatis" value="12dt"> 479,99 zł</span>
            <br>
            <input type="submit" value="ZAPISZ WYBÓR I PRZEJDŹ DO NASTĘPNEGO KROKU >" class="shopp">
        </form>
           
</div>
   
     </div>
    <?php 
        $name = basename(__FILE__);
        include 'footer.php';
    ?> 
    </div>

</body>

</html>